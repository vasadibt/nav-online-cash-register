<?php

$baseUrl = \NavOnlineCashRegister\Models\Config::TEST_URL;

$user = [
    "login" => "username",
    "password" => "password",
    // "passwordHash" => "...", // Opcionálisan, jelszó helyett a jelszó hash is átadható
    "taxNumber" => "12345678",
    "signKey" => "sign-key",
];

$softwareData = [
    "softwareId" => "123456789123456789",
    "softwareName" => "string",
    "softwareOperation" => "ONLINE_SERVICE",
    "softwareMainVersion" => "string",
    "softwareDevName" => "string",
    "softwareDevContact" => "string",
    "softwareDevCountryCode" => "HU",
    "softwareDevTaxNumber" => "string",
];


return (\NavOnlineCashRegister\Models\Config::createDefault())
    ->setSoftware(new \NavOnlineCashRegister\Models\Software($softwareData))
    ->setUser(new \NavOnlineCashRegister\Models\User($user))
    ->setBaseUrl($baseUrl);
