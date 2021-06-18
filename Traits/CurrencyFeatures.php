<?php

namespace Traits;

trait CurrencyFeatures
{
    private $currenciesName = [
        'USD' => 'Доллар США',
        'EUR' => 'Евро',
        'CHF' => 'Швейцарский франк',
        'JPY' => 'Японская иена',
        'CNY' => 'Китайский юань',
        'RUB' => 'Российский рубль',
    ];
    public function getRealName($currencyShortName)
    {
        if (isset($this->currenciesName[$currencyShortName])) {
            $fullName = $this->currenciesName[$currencyShortName];
            return $fullName;
        } else {
            $fullName = $currencyShortName;
            return $fullName;
        }
    }
}
