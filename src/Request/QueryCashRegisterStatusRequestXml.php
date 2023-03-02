<?php

namespace NavOnlineCashRegister\Request;

/**
 * responseEnvelope: QueryCashRegisterStatusResponse
 */
class QueryCashRegisterStatusRequestXml extends AbstractBaseRequest
{
    /**
     * @var string
     */
    protected $url = '/queryCashRegisterFile/{version}/queryCashRegisterStatus';
    /**
     * @var string
     */
    protected $rootName = 'QueryCashRegisterStatusRequest';
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
     * @return QueryCashRegisterStatusRequestXml
     */
    public function setAPNumberList($APNumberList)
    {
        $this->APNumberList = $APNumberList;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $requestBody = '<api:cashRegisterStatusQuery>' . "\n";
        $requestBody .= '                <api:APNumberList>' . "\n";
        foreach ($this->APNumberList as $APNumber) {
            $requestBody .= '                    <api:APNumber>' . $APNumber . '</api:APNumber>' . "\n";
        }
        $requestBody .= '                </api:APNumberList>' . "\n";
        $requestBody .= '            </api:cashRegisterStatusQuery>';
        return $requestBody;
    }
}