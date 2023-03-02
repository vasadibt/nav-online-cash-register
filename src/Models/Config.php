<?php

namespace NavOnlineCashRegister\Models;

use NavOnlineCashRegister\Helpers\HashGeneratorInterface;
use NavOnlineCashRegister\Helpers\RequestIdGenerator;
use NavOnlineCashRegister\Helpers\RequestIdGeneratorInterface;
use NavOnlineCashRegister\Helpers\Sha3_512Generator;
use NavOnlineCashRegister\Helpers\Sha512Generator;
use NavOnlineCashRegister\Helpers\TimestampGenerator;
use NavOnlineCashRegister\Helpers\TimestampGeneratorInterface;

class Config extends AbstractModel
{
    const TEST_URL = 'https://api-test-onlinepenztargep.nav.gov.hu';
    const PROD_URL = 'https://api-onlinepenztargep.nav.gov.hu';

    /**
     * @var User
     */
    protected $user;
    /**
     * @var Software
     */
    protected $software;
    /**
     * @var string
     */
    protected $baseUrl;
    /**
     * @var string
     */
    protected $version;
    /**
     * @var RequestIdGeneratorInterface
     */
    protected $requestIdGenerator;
    /**
     * @var HashGeneratorInterface
     */
    protected $sha3_512Generator;
    /**
     * @var HashGeneratorInterface
     */
    protected $sha512Generator;
    /**
     * @var TimestampGeneratorInterface
     */
    protected $timestampGenerator;

    /**
     * @param array $config
     *
     * @return static
     */
    public static function createDefault($config = [])
    {
        return new static(
            $config
            + [
                'baseUrl' => static::PROD_URL,
                'version' => 'v1',
                'requestIdGenerator' => new RequestIdGenerator(),
                'sha3_512Generator' => new Sha3_512Generator(),
                'sha512Generator' => new Sha512Generator(),
                'timestampGenerator' => new TimestampGenerator(),
            ]
        );
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Config
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return Software
     */
    public function getSoftware()
    {
        return $this->software;
    }

    /**
     * @param Software $software
     * @return Config
     */
    public function setSoftware($software)
    {
        $this->software = $software;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     * @return Config
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return Config
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return RequestIdGeneratorInterface
     */
    public function getRequestIdGenerator()
    {
        return $this->requestIdGenerator;
    }

    /**
     * @param RequestIdGeneratorInterface $requestIdGenerator
     * @return Config
     */
    public function setRequestIdGenerator($requestIdGenerator)
    {
        $this->requestIdGenerator = $requestIdGenerator;
        return $this;
    }

    /**
     * @return HashGeneratorInterface
     */
    public function getSha3_512Generator()
    {
        return $this->sha3_512Generator;
    }

    /**
     * @param HashGeneratorInterface $sha3_512Generator
     * @return Config
     */
    public function setSha3_512Generator($sha3_512Generator)
    {
        $this->sha3_512Generator = $sha3_512Generator;
        return $this;
    }

    /**
     * @return HashGeneratorInterface
     */
    public function getSha512Generator()
    {
        return $this->sha512Generator;
    }

    /**
     * @param HashGeneratorInterface $sha512Generator
     * @return Config
     */
    public function setSha512Generator($sha512Generator)
    {
        $this->sha512Generator = $sha512Generator;
        return $this;
    }

    /**
     * @return TimestampGeneratorInterface
     */
    public function getTimestampGenerator()
    {
        return $this->timestampGenerator;
    }

    /**
     * @param TimestampGeneratorInterface $timestampGenerator
     * @return Config
     */
    public function setTimestampGenerator($timestampGenerator)
    {
        $this->timestampGenerator = $timestampGenerator;
        return $this;
    }
}