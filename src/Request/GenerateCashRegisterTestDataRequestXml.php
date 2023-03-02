<?php

namespace NavOnlineCashRegister\Request;

/**
 * responseEnvelope: GenerateCashRegisterTestDataResponse
 */
class GenerateCashRegisterTestDataRequestXml extends AbstractBaseRequest
{
    /**
     * @var string
     */
    protected $url = '/generateCashRegisterTestData/{version}/generateCashRegisterTestData';
    /**
     * @var string
     */
    protected $rootName = 'GenerateCashRegisterTestDataRequest';
    /**
     * @var array
     */
    protected $APNumberList;

    /**
     * @return array
     */
    public function getAPNumberList()
    {
        return $this->APNumberList;
    }

    /**
     * @param array $APNumberList
     * @return GenerateCashRegisterTestDataRequestXml
     */
    public function setAPNumberList($APNumberList)
    {
        $this->APNumberList = $APNumberList;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $requestBody = '<api:generateCashRegisterTestDataParameter>' . "\n";
        foreach ($this->APNumberList as $APNumber) {
            $requestBody .= '                <api:APNumber>' . $APNumber . '</api:APNumber>' . "\n";
        }
        $requestBody .= '            </api:generateCashRegisterTestDataParameter>';
        return $requestBody;
    }
}