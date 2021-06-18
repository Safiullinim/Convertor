<?php

namespace Classes;

class RealConvertor extends Convertor
{
    public function loadRates()
    {
        date_default_timezone_set("Europe/Moscow");
        $filename = 'currencies/' . strftime("%G-%m-%d_%H-00.json");
        if (file_exists($filename)) {
            $realCurrencies = file_get_contents('currencies/' . strftime("%G-%m-%d_%H-00.json"));
        } else {
            $file = 'currencies/' . strftime("%G-%m-%d_%H-00.json");
            $realCurrencies = file_get_contents("https://api.exchangerate.host/latest?base=USD");
            file_put_contents($file, $realCurrencies);
        }
        $realCurrencies = json_decode($realCurrencies, true);
        foreach ($realCurrencies['rates'] as $key => $val) {
            // if (isset($this->currencies[$key])) {
            $this->currencies[$key] = $val;
            //  }
        }
    }
    public function __construct()
    {
        $this->loadRates();
    }
}
