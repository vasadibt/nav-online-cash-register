<?php

namespace NavOnlineCashRegister\Models;

abstract class AbstractModel
{
    /**
     * @param array $configs
     */
    public function __construct($configs = [])
    {
        foreach ($configs as $attribute => $value) {
            $setter = 'set' . ucfirst($attribute);
            if (method_exists($this, $setter)) {
                call_user_func([$this, $setter], $value);
            }
        }
    }
}