<?php

namespace Progjp\NbuApi;

abstract class NbuRequest
{
    const URL = 'https://bank.gov.ua/';
    
    public function buildRequest(): string
    {
        return self::URL;
    }
}