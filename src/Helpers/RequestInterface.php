<?php

namespace NavOnlineCashRegister\Helpers;

interface RequestInterface
{
    /**
     * Specification
     *  - Request url string
     * @return string
     */
    public function getUrl();

    /**
     * Specification
     *  - XML content root node name
     * @return string
     */
    public function getRootName();
}