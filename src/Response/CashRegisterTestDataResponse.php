<?php

namespace NavOnlineCashRegister\Response;

class CashRegisterTestDataResponse extends AbstractResponse
{
    /**
     * @var string
     */
    protected $funcCode;
    /**
     * @var string
     */
    protected $message;

    /**
     * @return string
     */
    public function getFuncCode()
    {
        return $this->funcCode;
    }

    /**
     * @param string $funcCode
     * @return CashRegisterTestDataResponse
     */
    public function setFuncCode($funcCode)
    {
        $this->funcCode = $funcCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return CashRegisterTestDataResponse
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param Response $baseResponse
     * @return static
     */
    public static function createFromResponse(Response $baseResponse)
    {
        $response = new static();
        $response->setFuncCode($baseResponse->getXml()->result->funcCode->__toString());
        $response->setMessage($baseResponse->getXml()->result->message->__toString());
        return $response;
    }
}