<?php

namespace Progjp\NbuApi;

use Progjp\NbuApi\DTO\BankDTO;
use Progjp\NbuApi\DTO\BankRequestDTO;

class BanksRequest extends NbuRequest implements NbuRequestInterface
{
    const string URL = 'NBU_BankInfo/get_data_branch_glbank';
    
    public function __construct(readonly private BankRequestDTO $currencyRequestDTO)
    {
    }
    
    public function buildRequest(): string
    {
        $parameters = [];
        $this->currencyRequestDTO->glmfo ? $parameters['glmfo'] = $this->currencyRequestDTO->glmfo : null;
        $this->currencyRequestDTO->type ? $parameters['typ'] = $this->currencyRequestDTO->type : null;
        
        return parent::URL . self::URL . '?json&' . http_build_query($parameters);
    }
    
    
    public function transform(array $result): array
    {
        $dtoArr = [];
        foreach ($result as $record) {
            $dtoArr[] = new BankDTO(
                $record->GLMFO,
                $record->NAME_E,
                $record->KOD_EDRPOU,
                $record->SHORTNAME,
                $record->FULLNAME,
            );
        }
        
        return $dtoArr;
    }
}