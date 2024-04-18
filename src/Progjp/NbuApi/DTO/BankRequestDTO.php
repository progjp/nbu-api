<?php

namespace Progjp\NbuApi\DTO;

class BankRequestDTO
{
    public function __construct(
        public ?string $glmfo,
        public ?string $type = null,
    )
    {
    }
}