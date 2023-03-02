<?php

namespace NavOnlineCashRegister\Response;

use ArrayObject;
use NavOnlineCashRegister\Models\AbstractModel;
use SimpleXMLElement;

class Response extends AbstractModel
{
    /**
     * @var SimpleXMLElement
     */
    protected $xml;
    /**
     * @var ArrayObject
     */
    protected $rawData;

    /**
     * @return SimpleXMLElement
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * @param SimpleXMLElement $xml
     * @return Response
     */
    public function setXml($xml)
    {
        $this->xml = $xml;
        return $this;
    }

    /**
     * @return ArrayObject
     */
    public function getRawData()
    {
        return $this->rawData;
    }

    /**
     * @param ArrayObject $rawData
     * @return Response
     */
    public function setRawData($rawData)
    {
        $this->rawData = $rawData;
        return $this;
    }


}