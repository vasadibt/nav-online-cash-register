<?php

namespace NavOnlineCashRegister\Models;

class Header extends AbstractModel
{
    const DEFAULT_REQUEST_VERSION = '1.0';
    const DEFAULT_HEADER_VERSION = '1.0';

    /**
     * @var string
     */
    protected $requestId;
    /**
     * @var string
     */
    protected $timestamp;
    /**
     * @var string
     */
    protected $requestVersion;
    /**
     * @var string
     */
    protected $headerVersion;

    /**
     * @param array $config
     *
     * @return Header
     */
    public static function createDefault($config = [])
    {
        return new static(
            $config
            + [
                'requestVersion' => static::DEFAULT_REQUEST_VERSION,
                'headerVersion' => static::DEFAULT_HEADER_VERSION,
            ]
        );
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param string $requestId
     * @return Header
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     * @return Header
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestVersion()
    {
        return $this->requestVersion;
    }

    /**
     * @param string $requestVersion
     * @return Header
     */
    public function setRequestVersion($requestVersion)
    {
        $this->requestVersion = $requestVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeaderVersion()
    {
        return $this->headerVersion;
    }

    /**
     * @param string $headerVersion
     * @return Header
     */
    public function setHeaderVersion($headerVersion)
    {
        $this->headerVersion = $headerVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $requestId = $this->getRequestId();
        $timestamp = $this->getTimestamp();
        return <<<XML
<com:header>
                <com:requestId>$requestId</com:requestId>
                <com:timestamp>$timestamp</com:timestamp>
                <com:requestVersion>1.0</com:requestVersion>
                <!--Optional:-->
                <com:headerVersion>1.0</com:headerVersion>
            </com:header>
XML;
    }
}