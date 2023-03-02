<?php

namespace NavOnlineCashRegister\Models;

class User extends AbstractModel
{
    /**
     * @var string
     */
    protected $login;
    /**
     * @var string
     */
    protected $password = null;
    /**
     * @var string
     */
    protected $passwordHash;
    /**
     * @var string
     */
    protected $taxNumber;
    /**
     * @var string
     */
    protected $signKey;
    /**
     * @var string
     */
    protected $requestSignature;

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * @param string $passwordHash
     * @return User
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxNumber()
    {
        return $this->taxNumber;
    }

    /**
     * @param string $taxNumber
     * @return User
     */
    public function setTaxNumber($taxNumber)
    {
        $this->taxNumber = $taxNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignKey()
    {
        return $this->signKey;
    }

    /**
     * @param string $signKey
     * @return User
     */
    public function setSignKey($signKey)
    {
        $this->signKey = $signKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestSignature()
    {
        return $this->requestSignature;
    }

    /**
     * @param string $requestSignature
     * @return User
     */
    public function setRequestSignature($requestSignature)
    {
        $this->requestSignature = $requestSignature;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $login = $this->getLogin();
        $passwordHash = $this->getPasswordHash();
        $taxNumber = $this->getTaxNumber();
        $requestSignature = $this->getRequestSignature();

        return <<<XML
<com:user>
                <com:login>$login</com:login>
                <com:passwordHash cryptoType="SHA-512">$passwordHash</com:passwordHash>
                <com:taxNumber>$taxNumber</com:taxNumber>
                <com:requestSignature cryptoType="SHA3-512">$requestSignature</com:requestSignature>
            </com:user>
XML;
    }
}