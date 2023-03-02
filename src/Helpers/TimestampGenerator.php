<?php

namespace NavOnlineCashRegister\Helpers;

class TimestampGenerator implements TimestampGeneratorInterface
{

    public function generate(): string
    {
        $now = microtime(true);
        $milliseconds = round(($now - floor($now)) * 1000);
        $milliseconds = min($milliseconds, 999);

        return gmdate("Y-m-d\TH:i:s", (int)$now) . sprintf(".%03dZ", $milliseconds);
    }
}