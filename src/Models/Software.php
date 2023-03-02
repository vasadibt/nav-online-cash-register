<?php

namespace NavOnlineCashRegister\Models;

class Software extends AbstractModel
{
    /**
     * @var string
     */
    protected $softwareId;
    /**
     * @var string
     */
    protected $softwareName;
    /**
     * @var string
     */
    protected $softwareOperation;
    /**
     * @var string
     */
    protected $softwareMainVersion;
    /**
     * @var string
     */
    protected $softwareDevName;
    /**
     * @var string
     */
    protected $softwareDevContact;
    /**
     * @var string
     */
    protected $softwareDevCountryCode;
    /**
     * @var string
     */
    protected $softwareDevTaxNumber;

    /**
     * @return string
     */
    public function getSoftwareId()
    {
        return $this->softwareId;
    }

    /**
     * @param string $softwareId
     * @return Software
     */
    public function setSoftwareId($softwareId)
    {
        $this->softwareId = $softwareId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoftwareName()
    {
        return $this->softwareName;
    }

    /**
     * @param string $softwareName
     * @return Software
     */
    public function setSoftwareName($softwareName)
    {
        $this->softwareName = $softwareName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoftwareOperation()
    {
        return $this->softwareOperation;
    }

    /**
     * @param string $softwareOperation
     * @return Software
     */
    public function setSoftwareOperation($softwareOperation)
    {
        $this->softwareOperation = $softwareOperation;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoftwareMainVersion()
    {
        return $this->softwareMainVersion;
    }

    /**
     * @param string $softwareMainVersion
     * @return Software
     */
    public function setSoftwareMainVersion($softwareMainVersion)
    {
        $this->softwareMainVersion = $softwareMainVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoftwareDevName()
    {
        return $this->softwareDevName;
    }

    /**
     * @param string $softwareDevName
     * @return Software
     */
    public function setSoftwareDevName($softwareDevName)
    {
        $this->softwareDevName = $softwareDevName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoftwareDevContact()
    {
        return $this->softwareDevContact;
    }

    /**
     * @param string $softwareDevContact
     * @return Software
     */
    public function setSoftwareDevContact($softwareDevContact)
    {
        $this->softwareDevContact = $softwareDevContact;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoftwareDevCountryCode()
    {
        return $this->softwareDevCountryCode;
    }

    /**
     * @param string $softwareDevCountryCode
     * @return Software
     */
    public function setSoftwareDevCountryCode($softwareDevCountryCode)
    {
        $this->softwareDevCountryCode = $softwareDevCountryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoftwareDevTaxNumber()
    {
        return $this->softwareDevTaxNumber;
    }

    /**
     * @param string $softwareDevTaxNumber
     * @return Software
     */
    public function setSoftwareDevTaxNumber($softwareDevTaxNumber)
    {
        $this->softwareDevTaxNumber = $softwareDevTaxNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $softwareId = $this->getSoftwareId();
        $softwareName = $this->getSoftwareName();
        $softwareOperation = $this->getSoftwareOperation();
        $softwareMainVersion = $this->getSoftwareMainVersion();
        $softwareDevName = $this->getSoftwareDevName();
        $softwareDevContact = $this->getSoftwareDevContact();
        $softwareDevCountryCode = $this->getSoftwareDevCountryCode();
        $softwareDevTaxNumber = $this->getSoftwareDevTaxNumber();

        return <<<XML
<api:software>
                <api:softwareId>$softwareId</api:softwareId>
                <api:softwareName>$softwareName</api:softwareName>
                <api:softwareOperation>$softwareOperation</api:softwareOperation>
                <api:softwareMainVersion>$softwareMainVersion</api:softwareMainVersion>
                <api:softwareDevName>$softwareDevName</api:softwareDevName>
                <api:softwareDevContact>$softwareDevContact</api:softwareDevContact>
                <api:softwareDevCountryCode>$softwareDevCountryCode</api:softwareDevCountryCode>
                <api:softwareDevTaxNumber>$softwareDevTaxNumber</api:softwareDevTaxNumber>
            </api:software>
XML;
    }
}