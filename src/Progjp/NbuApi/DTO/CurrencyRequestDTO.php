<?php

namespace Progjp\NbuApi\DTO;

class CurrencyRequestDTO
{
    public function __construct(
        public string $format,
        public ?string $currency = null,
        public ?\DateTimeImmutable $startDate = null,
        public ?\DateTimeImmutable $endDate = null,
        public ?string $order = null,
    )
    {
    }
}