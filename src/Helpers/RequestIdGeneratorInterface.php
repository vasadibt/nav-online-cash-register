<?php

namespace NavOnlineCashRegister\Helpers;

interface RequestIdGeneratorInterface
{
    /**
     * Specification:
     *  - Max length 30 char
     *  - Accept characters:  A-Z, 0-9
     *  - Validation regex: [+a-zA-Z0-9_]{1,30}
     *
     * @return string
     */
    public function generate(): string;
}