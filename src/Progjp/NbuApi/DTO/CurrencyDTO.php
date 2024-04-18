<?php

namespace Progjp\NbuApi\DTO;
use DateTimeImmutable;

class CurrencyDTO implements DTOInterface
{
    public function __construct(
        public DateTimeImmutable $exchangeDate,
        public float $rate,
        public string $currencyCode,
        public int $currencyIsoCode,
        public string $currencyUrkText,
        public string $currencyName,
    )
    {
    }
}