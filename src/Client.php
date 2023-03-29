<?php

namespace NavOnlineCashRegister;

use ArrayObject;
use NavOnlineCashRegister\Exception\BaseException;
use NavOnlineCashRegister\Exception\ResultException;
use NavOnlineCashRegister\Helpers\RequestInterface;
use NavOnlineCashRegister\Models\AbstractModel;
use NavOnlineCashRegister\Models\Config;
use NavOnlineCashRegister\Models\Debug;
use NavOnlineCashRegister\Request\GenerateCashRegisterTestDataRequestXml;
use NavOnlineCashRegister\Request\QueryCashRegisterFileRequestXml;
use NavOnlineCashRegister\Request\QueryCashRegisterStatusRequestXml;
use NavOnlineCashRegister\Request\Request;
use NavOnlineCashRegister\Response\CashRegisterFileResponse;
use NavOnlineCashRegister\Response\CashRegisterStatusResponse;
use NavOnlineCashRegister\Response\CashRegisterTestDataResponse;
use NavOnlineCashRegister\Response\RawData;
use NavOnlineCashRegister\Response\Response;

class Client extends AbstractModel
{
    /**
     * @var Config
     */
    protected Config $config;
    /**
     * @var Debug
     */
    protected Debug $debug;

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @param Config $config
     * @return Client
     */
    public function setConfig(Config $config): Client
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return Debug
     */
    public function getDebug(): Debug
    {
        return $this->debug;
    }

    /**
     * @param Debug $debug
     * @return Client
     */
    public function setDebug(Debug $debug): Client
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * @param RequestInterface $request
     * @return Response
     * @throws BaseException
     */
    public function post($request)
    {
        $url = str_replace('{version}', $this->getConfig()->getVersion(), $this->getConfig()->getBaseUrl() . $request->getUrl());
        $baseRequest = Request::create($this->getConfig(), $request);
        $xmlString = $baseRequest->__toString();

        $this->setDebug(new Debug());
        $this->getDebug()->setLastRequestUrl($url);
        $this->getDebug()->setLastRequestBody($xmlString);
        $this->getDebug()->setLastRequestId($baseRequest->getHeader()->getRequestId());


        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, ['body' => $xmlString]);
        $responseBody = $response->getBody()->__toString();

        $this->getDebug()->setLastResponseStatusCode($response->getStatusCode());
        $this->getDebug()->setLastResponseHeader($response->getHeaders());
        $this->getDebug()->setLastResponseBody($responseBody);

        $lastFullResult = $this->parseResponse($responseBody);

        $this->getDebug()->setLastFullResult($lastFullResult);

        if ($lastFullResult->getXml()->result->funcCode->__toString() == 'ERROR') {
            throw new ResultException($lastFullResult->getXml()->result);
        }

        return $lastFullResult;
    }

    /**
     * @param string $responseString
     * @return Response
     */
    protected function parseResponse($responseString)
    {
        $firstLine = preg_split('#\r?\n#', $responseString, 2)[0];
        $responseString = str_replace($firstLine . '--', $firstLine, $responseString);
        $parts = explode("\r\n" . $firstLine . "\r\n", "\r\n" . $responseString . "\r\n");

        $parts = array_slice($parts, 1, -1);

        $responseXmlString = array_shift($parts);
        $position = mb_strpos($responseXmlString, "\r\n\r\n");

        $responseXmlString = static::removeNamespacesFromXmlString(mb_substr($responseXmlString, $position + 4));
        $rawDataItems = new ArrayObject();

        foreach ($parts as $part) {
            $position = mb_strpos($part, "\r\n\r\n");
            $headerString = mb_substr($part, 0, $position);
            $bodyString = mb_substr($part, $position + 4);

            $headers = static::parseHeader($headerString);

            $rawData = new RawData();
            $rawData->setId(trim($headers['Content-ID'], '<>'));
            $rawData->setHeaders($headers);
            $rawData->setContent($bodyString);
            $rawDataItems->append($rawData);
        }

        $responseXmlString = preg_replace('/[\x00-\x1F\x7F]/', '', $responseXmlString);
        $responseXml = simplexml_load_string($responseXmlString);
        
        $result = new Response();
        $result->setXml($responseXml->Body->children()[0]);
        $result->setRawData($rawDataItems);
        return $result;
    }

    /**
     * Remove namespaces from XML string
     *
     * @param string $xmlString
     * @return string $xmlString
     */
    public static function removeNamespacesFromXmlString($xmlString)
    {
        return preg_replace('/(<\/|<)[a-z0-9]+:([a-z0-9]+[ =>])/i', '$1$2', $xmlString);
    }

    /**
     * @param string $headerString
     * @return array
     */
    public static function parseHeader($headerString)
    {
        $headers = [];
        foreach (explode("\r\n", $headerString) as $line) {
            list($key, $value) = explode(': ', $line);
            $headers[$key] = $value;
        }
        return $headers;
    }

    /**
     * @param array $APNumberList
     *
     * @return CashRegisterStatusResponse
     *
     * @throws BaseException
     */
    public function queryCashRegisterStatus(array $APNumberList)
    {
        return CashRegisterStatusResponse::createFromResponse(
            $this->post(new QueryCashRegisterStatusRequestXml(compact('APNumberList')))
        );
    }

    /**
     * @param string $APNumber
     * @param int $fileNumberStart
     * @param int $fileNumberEnd
     *
     * @return CashRegisterFileResponse
     *
     * @throws BaseException
     */
    public function queryCashRegisterFile($APNumber, $fileNumberStart, $fileNumberEnd)
    {
        return CashRegisterFileResponse::createFromResponse(
            $this->post(new QueryCashRegisterFileRequestXml(compact('APNumber', 'fileNumberStart', 'fileNumberEnd')))
        );
    }

    /**
     * @param array $APNumberList
     *
     * @return CashRegisterTestDataResponse
     *
     * @throws BaseException
     */
    public function generateCashRegisterTestData(array $APNumberList)
    {
        if ($this->getConfig()->getBaseUrl() != Config::TEST_URL) {
            throw new BaseException('Csak TEST szerveren elérhető request!');
        }

        return CashRegisterTestDataResponse::createFromResponse(
            $this->post(new GenerateCashRegisterTestDataRequestXml(compact('APNumberList')))
        );
    }
}
