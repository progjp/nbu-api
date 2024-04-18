<?php
require __DIR__ . '/../../vendor/autoload.php';

//include "NbuApiClient.php";
//include "CurrencyRequest.php";
//include "CurrencyRequest.php";
use Progjp\NbuApi\NbuApiClient;

$d = new NbuApiClient();

/*$d->sendRequest(new \NbuApi\CurrencyRequest(
    new \NbuApi\DTO\CurrencyRequestDTO(
        'json',
        'from',
        new DateTimeImmutable(),
        new DateTimeImmutable(),
    )));*/

$c = $d->sendRequest(new \Progjp\NbuApi\CurrencyRequest(
    new \Progjp\NbuApi\DTO\CurrencyRequestDTO(
        'json',
        null,
        new DateTimeImmutable(),
        new DateTimeImmutable(),
    )))->transform();
var_dump($c);die();
$c = $d->sendRequest(new \Progjp\NbuApi\BanksRequest(
    new \Progjp\NbuApi\DTO\BankRequestDTO(
        null,
        1,
    )))->transform();

var_dump($c);