<?php

namespace Progjp\NbuApi\DTO;
use DateTimeImmutable;

class BankDTO implements DTOInterface
{
    public function __construct(
        public string $mfo,
        public string $name,
        public string $codeEdrpou,
        public string $shortName,
        public string $fullName,
    )
    {
    }
}