<?php

include "vendor/autoload.php";

use Classes\RealConvertor;

$realConvertor = new RealConvertor();
if (isset($_SERVER['REQUEST_URI'])) {
    $from = $_GET['from'] ?? '';
    $from = strtoupper($from);
    $to = $_GET['to'] ?? '';
    $to = strtoupper($to);
    $amount = $_GET['amount'] ?? '';
    $result = [];
    $error = '';
    if ($from && $to && $amount) {
        try {
            $result['result'] = number_format($realConvertor->convert($from, $to, $amount), 2, ',', '');
            $result['amount'] = number_format($amount, 2, ',', '');
            $result['from'] = $realConvertor->getRealName($from);
            $result['to'] = $realConvertor->getRealName($to);
        } catch (Exception $e) {
            $error = 'Ошибка: ' .  $e->getMessage();
        }
    }
    require_once('pages/convertor.php');
    exit;
}
$from = readline("Выберите одну из перечисленных валют: " . $realConvertor->getCurrenciesStr() . " ");
$from = strtoupper($from);
$to = readline("Выберите валюту в которую необходимо конвертировать ");
$to = strtoupper($to);
$amount = readline("Введите сумму ");
try {
    $conver = number_format($realConvertor->convert($from, $to, $amount), 2, ',', '');
    echo json_encode(number_format($amount, 2, ',', '') . " " . $realConvertor->getRealName($from) .
        " это " . $conver . " " . $realConvertor->getRealName($to), JSON_UNESCAPED_UNICODE);
} catch (Exception $e) {
    echo 'Недопустимая ошибка: ',  $e->getMessage(), "\n";
}
