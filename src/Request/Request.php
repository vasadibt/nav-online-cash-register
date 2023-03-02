<?php

namespace NavOnlineCashRegister\Request;

use NavOnlineCashRegister\Helpers\RequestInterface;
use NavOnlineCashRegister\Models\AbstractModel;
use NavOnlineCashRegister\Models\Config;
use NavOnlineCashRegister\Models\Header;
use NavOnlineCashRegister\Models\Software;
use NavOnlineCashRegister\Models\User;

class Request extends AbstractModel
{
    /**
     * @var Config
     */
    protected $config;
    /**
     * @var Header
     */
    protected $header;
    /**
     * @var User
     */
    protected $user;
    /**
     * @var Software
     */
    protected $software;
    /**
     * @var RequestInterface
     */
    protected $body;

    /**
     * @param Config $config
     * @param RequestInterface $request
     * @return static
     */
    public static function create($config, $request)
    {
        $header = (new Header())
            ->setRequestId($config->getRequestIdGenerator()->generate())
            ->setTimestamp($config->getTimestampGenerator()->generate())
            ->setRequestVersion(Header::DEFAULT_REQUEST_VERSION)
            ->setHeaderVersion(Header::DEFAULT_REQUEST_VERSION);

        return (new static())
            ->setConfig($config)
            ->setHeader($header)
            ->setUser(clone $config->getUser())
            ->fillUserPasswordHash()
            ->fillUserRequestSignature()
            ->setSoftware($config->getSoftware())
            ->setBody($request);
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Config $config
     * @return Request
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return Header
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param Header $header
     * @return Request
     */
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Request
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return Software
     */
    public function getSoftware()
    {
        return $this->software;
    }

    /**
     * @param Software $software
     * @return Request
     */
    public function setSoftware($software)
    {
        $this->software = $software;
        return $this;
    }

    /**
     * @return RequestInterface
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param RequestInterface $body
     * @return Request
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $rootName = $this->getBody()->getRootName();

        $header = $this->getHeader();
        $user = $this->getUser();
        $software = $this->getSoftware();
        $body = $this->getBody();


        return <<<XML
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:api="http://schemas.nav.gov.hu/OPF/1.0/api"
	           xmlns:com="http://schemas.nav.gov.hu/NTCA/1.0/common">
    <soap:Header/>
    <soap:Body>
        <api:$rootName>
            $header
            $user
            $software
            $body
        </api:$rootName>
    </soap:Body>
</soap:Envelope>
XML;
    }

    /**
     * @return string
     */
    public function generatePasswordHash()
    {
        return $this->getConfig()->getSha512Generator()->generate(
            $this->getUser()->getPassword()
        );
    }

    /**
     * @return string
     */
    public function generateRequestSignature()
    {
        return $this->getHeader()->getRequestId()
            . date('YmdHis', strtotime(substr($this->getHeader()->getTimestamp(), 0, 19)))
            . $this->getConfig()->getUser()->getSignKey();
    }

    /**
     * @return string
     */
    public function generateRequestSignatureHash()
    {
        return $this->getConfig()->getSha3_512Generator()->generate(
            $this->generateRequestSignature()
        );
    }

    /**
     * @return Request
     */
    public function fillUserPasswordHash()
    {
        if (empty($this->getUser()->getPasswordHash())) {
            $this->getUser()->setPasswordHash($this->generatePasswordHash());
        }
        return $this;
    }

    /**
     * @return Request
     */
    public function fillUserRequestSignature()
    {
        $this->getUser()->setRequestSignature(
            $this->generateRequestSignatureHash()
        );
        return $this;
    }
}