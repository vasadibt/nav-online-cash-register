<?php

namespace NavOnlineCashRegister\Response;

use NavOnlineCashRegister\Models\AbstractModel;

class CashRegisterStatus extends AbstractModel
{
    protected $APNumber;
    protected $lastCommunicationDate;
    protected $lastFileDate;
    protected $minAvailableFileNumber;
    protected $maxAvailableFileNumber;

    /**
     * @return mixed
     */
    public function getAPNumber()
    {
        return $this->APNumber;
    }

    /**
     * @param mixed $APNumber
     * @return CashRegisterStatus
     */
    public function setAPNumber($APNumber)
    {
        $this->APNumber = $APNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastCommunicationDate()
    {
        return $this->lastCommunicationDate;
    }

    /**
     * @param mixed $lastCommunicationDate
     * @return CashRegisterStatus
     */
    public function setLastCommunicationDate($lastCommunicationDate)
    {
        $this->lastCommunicationDate = $lastCommunicationDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastFileDate()
    {
        return $this->lastFileDate;
    }

    /**
     * @param mixed $lastFileDate
     * @return CashRegisterStatus
     */
    public function setLastFileDate($lastFileDate)
    {
        $this->lastFileDate = $lastFileDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMinAvailableFileNumber()
    {
        return $this->minAvailableFileNumber;
    }

    /**
     * @param mixed $minAvailableFileNumber
     * @return CashRegisterStatus
     */
    public function setMinAvailableFileNumber($minAvailableFileNumber)
    {
        $this->minAvailableFileNumber = $minAvailableFileNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxAvailableFileNumber()
    {
        return $this->maxAvailableFileNumber;
    }

    /**
     * @param mixed $maxAvailableFileNumber
     * @return CashRegisterStatus
     */
    public function setMaxAvailableFileNumber($maxAvailableFileNumber)
    {
        $this->maxAvailableFileNumber = $maxAvailableFileNumber;
        return $this;
    }
}