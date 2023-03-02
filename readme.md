# NAV Online cash register

> PHP interface for Online Invoice Data Reporting System of Hungarian Tax Office (NAV)

## 1. Install via composer

NAV Online cash register can be installed using composer.
Run following command to install:

```bash
php composer.phar require vasadibt/nav-online-cash-register
```

## Create a new instance from API client

```php
$user = [
    "login" => "username",
    "password" => "password",
    // "passwordHash" => "...", // Optional value, the password hash can be passed instead of the password
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
$config = \NavOnlineCashRegister\Models\Config::createDefault();
$config->setSoftware(new \NavOnlineCashRegister\Models\Software($softwareData));
$config->setUser(new \NavOnlineCashRegister\Models\User($user));
$config->setBaseUrl(\NavOnlineCashRegister\Models\Config::TEST_URL);

$client = new \NavOnlineCashRegister\Client(['config' => $config]);
```

## Get cash registers statuses by AP Numbers

```php
try{
    /** @var \NavOnlineCashRegister\Response\CashRegisterStatusResponse $response */
    $response = $client->queryCashRegisterStatus([
        'A11223344',
        'A11223345',
        'A11223346',
    ]);
} catch (\NavOnlineCashRegister\Exception\BaseException $e){
    // Log::error($e);
}
```

## Get cash register files by AP Number

```php
try{
    /** @var \NavOnlineCashRegister\Response\CashRegisterFileResponse $response */
    $response = $client->queryCashRegisterFile('A11223344', 1, 2);
} catch (\NavOnlineCashRegister\Exception\BaseException $e){
    // Log::error($e);
}
```

## Get cash register files by AP Number

```php
try{
    /** @var \NavOnlineCashRegister\Response\CashRegisterFileResponse $response */
    $response = $client->queryCashRegisterFile('A11223344', 1, 2);
} catch (\NavOnlineCashRegister\Exception\BaseException $e){
    // Log::error($e);
}
```

## Generate tests data to cash registers

> **Warning**
> Just in TEST server!
> 
```php
try{
    /** @var \NavOnlineCashRegister\Response\CashRegisterTestDataResponse $response */
    $response = $client->generateCashRegisterTestData([
        'A11223344',
        'A11223345',
        'A11223346',
    ]);
} catch (\NavOnlineCashRegister\Exception\BaseException $e){
    // Log::error($e);
}
```
