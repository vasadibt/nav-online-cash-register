#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

$client = new \NavOnlineCashRegister\Client([
    'config' => require __DIR__ . '/config.php'
]);

print_r(
    $client->queryCashRegisterStatus([
        'A11223344',
        'A11223345',
        'A11223346',
    ])
);

