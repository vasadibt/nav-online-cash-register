<?php

namespace NavOnlineCashRegister\Models;

use NavOnlineCashRegister\Response\Response;

class Debug extends AbstractModel
{
    /**
     * @var string
     */
    protected $lastRequestUrl;
    /**
     * @var string
     */
    protected $lastRequestHeader;
    /**
     * @var string
     */
    protected $lastRequestBody;
    /**
     * @var int
     */
    protected $lastResponseStatusCode;
    /**
     * @var array
     */
    protected $lastResponseHeader;
    /**
     * @var string
     */
    protected $lastResponseBody;
    /**
     * @var string
     */
    protected $lastRequestId;
    /**
     * @var string
     */
    protected $lastResponseXml;
    /**
     * @var Response
     */
    protected $lastFullResult;

    /**
     * @return string
     */
    public function getLastRequestUrl()
    {
        return $this->lastRequestUrl;
    }

    /**
     * @param string $lastRequestUrl
     * @return Debug
     */
    public function setLastRequestUrl($lastRequestUrl)
    {
        $this->lastRequestUrl = $lastRequestUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastRequestBody()
    {
        return $this->lastRequestBody;
    }

    /**
     * @param string $lastRequestBody
     * @return Debug
     */
    public function setLastRequestBody($lastRequestBody)
    {
        $this->lastRequestBody = $lastRequestBody;
        return $this;
    }

    /**
     * @return int
     */
    public function getLastResponseStatusCode()
    {
        return $this->lastResponseStatusCode;
    }

    /**
     * @param int $lastResponseStatusCode
     * @return Debug
     */
    public function setLastResponseStatusCode($lastResponseStatusCode)
    {
        $this->lastResponseStatusCode = $lastResponseStatusCode;
        return $this;
    }

    /**
     * @return array
     */
    public function getLastResponseHeader()
    {
        return $this->lastResponseHeader;
    }

    /**
     * @param array $lastResponseHeader
     * @return Debug
     */
    public function setLastResponseHeader($lastResponseHeader)
    {
        $this->lastResponseHeader = $lastResponseHeader;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastResponseBody()
    {
        return $this->lastResponseBody;
    }

    /**
     * @param string $lastResponseBody
     * @return Debug
     */
    public function setLastResponseBody($lastResponseBody)
    {
        $this->lastResponseBody = $lastResponseBody;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastRequestId()
    {
        return $this->lastRequestId;
    }

    /**
     * @param string $lastRequestId
     * @return Debug
     */
    public function setLastRequestId($lastRequestId)
    {
        $this->lastRequestId = $lastRequestId;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastResponseXml()
    {
        return $this->lastResponseXml;
    }

    /**
     * @param string $lastResponseXml
     * @return Debug
     */
    public function setLastResponseXml($lastResponseXml)
    {
        $this->lastResponseXml = $lastResponseXml;
        return $this;
    }

    /**
     * @return Response
     */
    public function getLastFullResult()
    {
        return $this->lastFullResult;
    }

    /**
     * @param Response $lastFullResult
     * @return Debug
     */
    public function setLastFullResult($lastFullResult)
    {
        $this->lastFullResult = $lastFullResult;
        return $this;
    }

    /**
     * @return Debug
     */
    public function reset()
    {
        $this->setLastRequestUrl(null);
        $this->setLastRequestHeader(null);
        $this->setLastRequestBody(null);
        $this->setLastResponseHeader(null);
        $this->setLastResponseBody(null);
        $this->setLastRequestId(null);
        $this->setLastResponseXml(null);
        $this->setLastFullResult(null);
        return $this;
    }
}