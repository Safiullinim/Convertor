<?php

namespace Classes;

use Traits\CurrencyFeatures;
use Exception;

class Convertor
{
    use CurrencyFeatures;

    protected $currencies = [
        'USD' => 1,
        'EUR' => 0.6181966945,
        'CHF' => 0.8969890362,
        'JPY' => 108.8937980691,
        'CNY' => 6.4229258714,
        'RUB' => 63.6683848797,
    ];
    public function convert($from, $to, $amount)
    {
        $pattern = '/^[0-9]*\.?[0-9]*$/';
        if (
            !isset($this->currencies[$from]) || !isset($this->currencies[$to]) ||
            !preg_match($pattern, $amount) || $amount == ''
        ) {
            throw new Exception('Cумма введена неверно');
        }
        $currencyCount = ($this->currencies[$to] * $amount) / $this->currencies[$from];
        return $currencyCount;
    }
    public function getCurrencies()
    {
        return $this->currencies;
    }
    public function getCurrenciesKeys()
    {
        return array_keys($this->currencies);
    }
    public function getCurrenciesStr()
    {
        return implode(", ", $this->getCurrenciesKeys());
    }
}
