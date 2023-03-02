<?php

namespace NavOnlineCashRegister\Helpers;

use NavOnlineCashRegister\Exception\BaseException;

class Sha3_512Generator implements HashGeneratorInterface
{

    /**
     * @param string $data
     * @return string
     * @throws BaseException
     */
    public function generate($data): string
    {
        if (!in_array('sha3-512', hash_algos())) {
            throw new BaseException('"sha3-512" nem támogatott!');
        }

        return strtoupper(hash('sha3-512', $data));
    }
}