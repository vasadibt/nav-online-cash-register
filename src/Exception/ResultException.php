<?php

namespace NavOnlineCashRegister\Exception;

use NavOnlineCashRegister\Response\Response;
use SimpleXMLElement;

class ResultException extends BaseException
{

    /**
     * @var SimpleXMLElement
     */
    protected $result;

    /**
     * @param SimpleXMLElement $result
     */
    function __construct($result)
    {
        $this->result = $result;
        parent::__construct($this->getResultMessage());
    }

    /**
     * @return string
     */
    public function getResultMessage()
    {
        $result = $this->getResult();
        return sprintf('%s (%s)', $result->message, $result->errorCode);
    }

    /**
     * @return SimpleXMLElement
     */
    public function getResult()
    {
        return $this->result;
    }
}
