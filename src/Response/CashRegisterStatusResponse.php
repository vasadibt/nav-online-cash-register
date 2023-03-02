<?php

namespace NavOnlineCashRegister\Response;

class CashRegisterStatusResponse extends AbstractResponse
{
    /**
     * @var CashRegisterStatus[]
     */
    protected $cashRegisterStatuses;

    /**
     * @return CashRegisterStatus[]
     */
    public function getCashRegisterStatuses(): array
    {
        return $this->cashRegisterStatuses;
    }

    /**
     * @param CashRegisterStatus[] $cashRegisterStatuses
     * @return CashRegisterStatusResponse
     */
    public function setCashRegisterStatuses(array $cashRegisterStatuses): CashRegisterStatusResponse
    {
        $this->cashRegisterStatuses = $cashRegisterStatuses;
        return $this;
    }

    /**
     * @param Response $baseResponse
     * @return static
     */
    public static function createFromResponse(Response $baseResponse)
    {
        $response = new static();
        $cashRegisterStatuses = [];
        if ($baseResponse->getXml()->cashRegisterStatusResult) {
            foreach ($baseResponse->getXml()->cashRegisterStatusResult->cashRegisterStatusList->cashRegisterStatus as $cashRegisterStatus) {
                $status = new CashRegisterStatus();
                $status->setAPNumber($cashRegisterStatus->APNumber->__toString());
                $status->setLastCommunicationDate(new \DateTime($cashRegisterStatus->lastCommunicationDate->__toString()));
                $status->setLastFileDate(new \DateTime($cashRegisterStatus->lastFileDate->__toString()));
                $status->setMinAvailableFileNumber(intval($cashRegisterStatus->minAvailableFileNumber->__toString()));
                $status->setMaxAvailableFileNumber(intval($cashRegisterStatus->maxAvailableFileNumber->__toString()));
                $cashRegisterStatuses[] = $status;
            }
        }

        $response->setCashRegisterStatuses($cashRegisterStatuses);

        return $response;
    }
}