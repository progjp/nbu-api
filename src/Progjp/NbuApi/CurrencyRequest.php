<?php

namespace Progjp\NbuApi;

use Progjp\NbuApi\DTO\CurrencyDTO;
use Progjp\NbuApi\DTO\CurrencyRequestDTO;

class CurrencyRequest extends NbuRequest implements NbuRequestInterface
{
    const string URL = 'NBU_Exchange/exchange_site';
    
    public function __construct(readonly private CurrencyRequestDTO $currencyRequestDTO)
    {
    }
    
    public function buildRequest(): string
    {
        $parameters = [];
        $this->currencyRequestDTO->currency ? $parameters['valcode'] = $this->currencyRequestDTO->currency : null;
        $this->currencyRequestDTO->startDate ? $parameters['start'] = $this->currencyRequestDTO->startDate->format('Ymd') : null;
        $this->currencyRequestDTO->endDate ? $parameters['end'] = $this->currencyRequestDTO->endDate->format('Ymd') : null;
        $this->currencyRequestDTO->order ? $parameters['order'] = $this->currencyRequestDTO->order : null;
        
        return parent::URL . self::URL . '?json&' . http_build_query($parameters);
    }
    
    
    public function transform(array $result): array
    {
        $dtoArr = [];
        foreach ($result as $record) {
            $dtoArr[] = new CurrencyDTO(
                new \DateTimeImmutable($record->exchangedate),
                (float)$record->rate,
                $record->cc,
                (int)$record->r030,
                $record->txt,
                $record->enname,
            );
        }
        
        return $dtoArr;
    }
}