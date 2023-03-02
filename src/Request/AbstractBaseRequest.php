<?php

namespace NavOnlineCashRegister\Request;

use NavOnlineCashRegister\Helpers\RequestInterface;
use NavOnlineCashRegister\Models\AbstractModel;

abstract class AbstractBaseRequest extends AbstractModel implements RequestInterface
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $rootName;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return AbstractBaseRequest
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getRootName()
    {
        return $this->rootName;
    }

    /**
     * @param string $rootName
     * @return AbstractBaseRequest
     */
    public function setRootName($rootName)
    {
        $this->rootName = $rootName;
        return $this;
    }

}