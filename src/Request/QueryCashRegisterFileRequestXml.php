<?php

namespace NavOnlineCashRegister\Request;

/**
 * responseEnvelope: QueryCashRegisterFileDataResponse
 */
class QueryCashRegisterFileRequestXml extends AbstractBaseRequest
{
    /**
     * @var string
     */
    protected $url = '/queryCashRegisterFile/{version}/queryCashRegisterFile';
    /**
     * @var string
     */
    protected $rootName = 'QueryCashRegisterFileDataRequest';
    /**
     * @var string
     */
    protected $APNumber;
    /**
     * @var string
     */
    protected $fileNumberStart;
    /**
     * @var string
     */
    protected $fileNumberEnd;

    /**
     * @return string
     */
    public function getAPNumber()
    {
        return $this->APNumber;
    }

    /**
     * @param string $APNumber
     * @return QueryCashRegisterFileRequestXml
     */
    public function setAPNumber($APNumber)
    {
        $this->APNumber = $APNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileNumberStart()
    {
        return $this->fileNumberStart;
    }

    /**
     * @param string $fileNumberStart
     * @return QueryCashRegisterFileRequestXml
     */
    public function setFileNumberStart($fileNumberStart)
    {
        $this->fileNumberStart = $fileNumberStart;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileNumberEnd()
    {
        return $this->fileNumberEnd;
    }

    /**
     * @param string $fileNumberEnd
     * @return QueryCashRegisterFileRequestXml
     */
    public function setFileNumberEnd($fileNumberEnd)
    {
        $this->fileNumberEnd = $fileNumberEnd;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $APNumber = $this->APNumber;
        $fileNumberStart = $this->fileNumberStart;
        $fileNumberEnd = $this->fileNumberEnd;

        return <<<XML
<api:cashRegisterFileDataQuery>
                <api:APNumber>$APNumber</api:APNumber>
                <api:fileNumberStart>$fileNumberStart</api:fileNumberStart>
                <api:fileNumberEnd>$fileNumberEnd</api:fileNumberEnd>
            </api:cashRegisterFileDataQuery>
XML;
    }
}