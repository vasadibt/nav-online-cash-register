<?php

namespace NavOnlineCashRegister\Helpers;

class RequestIdGenerator implements RequestIdGeneratorInterface
{
    /**
     * @return string
     */
    public function generate(): string
    {
        $microtime = explode(' ', microtime());
        return 'RID' . $microtime[1] . 'M' . substr($microtime[0], 2) . 'R' . mt_rand(10000, 99999);
    }
}