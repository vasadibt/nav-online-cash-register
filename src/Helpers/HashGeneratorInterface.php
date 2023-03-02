<?php

namespace NavOnlineCashRegister\Helpers;

interface HashGeneratorInterface
{
    /**
     * Specification:
     *  - Return hashed data
     *
     * @param string $data
     *
     * @return string
     */
    public function generate($data): string;
}