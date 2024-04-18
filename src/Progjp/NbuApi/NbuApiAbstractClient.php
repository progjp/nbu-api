<?php

namespace Progjp\NbuApi;

use GuzzleHttp\Client;

abstract class NbuApiAbstractClient
{
    const URL = "https://bank.gov.ua/";
    
    protected Client $client;
    public NbuRequestInterface $request;
    public array $result;
    
    public function __construct()
    {
        $this->client = new Client();
    }
    public function sendRequest(NbuRequestInterface $request)
    {
    
    }
}