<?php

namespace App\Controllers;

use App\Components\IndoArabicForRomanNumerals;
use App\Components\RomanNumeralsForIndoArabic;
use App\Controllers\ErrorController;

class ApiConversorController
{
  public static function numero_para_algarismo(string $numero)
  {
    header('Content-Type: application/json');

    $result = (new IndoArabicForRomanNumerals)->convert($numero);

    if ($result['error']) {
      return ErrorController::error_api(400, $result['msg']);
    }

    http_response_code(200);

    die(json_encode([
      'code' => 200,
      'result' => $result['result']
    ]));
  }

  public static function algarismo_para_numero(string $algarismo)
  {
    header('Content-Type: application/json');

    $result = (new RomanNumeralsForIndoArabic)->convert($algarismo);

    if ($result['error']) {
      return ErrorController::error_api(400, $result['msg']);
    }

    http_response_code(200);

    die(json_encode([
      'code' => 200,
      'result' => $result['result']
    ]));
  }
}
