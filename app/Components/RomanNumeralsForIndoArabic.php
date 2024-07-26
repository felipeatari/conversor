<?php

namespace App\Components;

class RomanNumeralsForIndoArabic
{
  public function convert(string $algarismo)
  {
    $algarismo = strtoupper($algarismo);

    if (! preg_match('/^[IVXLCDM]+$/', $algarismo)) {
      return [
        'error' => true,
        'msg' => 'Permitido Apenas: I, V, X, L, C, D e M'
      ];
    }

    $algarismos = str_split(strrev($algarismo));
    $numero_anterior = 0;
    $result = 0;
    $return = [];
    $tabela_conversao = [
      'I' => 1,
      'V' => 5,
      'X' => 10,
      'L' => 50,
      'C' => 100,
      'D' => 500,
      'M' => 1000
    ];

    foreach ($algarismos as $algarismo):
      if (! isset($tabela_conversao[$algarismo])) continue;

      $numero_atual = $tabela_conversao[$algarismo];

      if ($numero_atual >= $numero_anterior) {
        $result += $numero_atual;
      } else {
        $result -= $numero_atual;
      }

      $numero_anterior = $numero_atual;
    endforeach;

    return [
      'error' => false,
      'result' => $result
    ];
  }
}
