<?php

namespace NavOnlineCashRegister\Helpers;

use NavOnlineCashRegister\Exception\BaseException;

class Sha512Generator implements HashGeneratorInterface
{

    /**
     * @param string $data
     * @return string
     * @throws BaseException
     */
    public function generate($data): string
    {
        if (!in_array('sha512', hash_algos())) {
            throw new BaseException('"sha512" nem támogatott!');
        }

        return strtoupper(hash('sha512', $data));
    }
}