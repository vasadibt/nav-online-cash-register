<?php

namespace NavOnlineCashRegister\Helpers;

interface TimestampGeneratorInterface
{
    /**
     * Specification:
     *  - Client timestamp in UTC with milliseconds
     *
     * @return string
     */
    public function generate(): string;
}