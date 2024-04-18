<?php

namespace Progjp\NbuApi;

use GuzzleHttp\Exception\GuzzleException;

class NbuApiClient extends NbuApiAbstractClient
{
    const URL = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @throws \Exception
     */
    public function sendRequest(NbuRequestInterface $request): self
    {
        $url =  $request->buildRequest();
        $this->request = $request;
        try {
            $this->result = json_decode($this->client->request(
                'GET',
                $url
            )
                ->getBody()
                ->getContents());
        } catch (\RuntimeException|GuzzleException $e) {
            throw new \Exception($e);
        }
        
        return $this;
    }
    
    public function transform(): array
    {
        return $this->request->transform($this->result);
    }
}