<?php

namespace App\Components;

class IndoArabicForRomanNumerals
{
  public function convert(string $numero)
  {
    $numero = preg_replace('/\D+/', '', $numero);

    if (! is_numeric($numero)) {
      return [
        'error' => true,
        'msg' => 'Deve conter apenas números'
      ];
    }

    if ($numero > 100000) {
      return [
        'error' => true,
        'msg' => 'Número deve ser menor que 100000'
      ];
    }

    $numero_qtd = strlen($numero);
    $numeros = str_split($numero);
    $resultado = '';
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

    foreach ($numeros as $numero):
      $numero_qtd--;

      $numero_completo = str_pad($numero, ((int) $numero_qtd + 1), '0', STR_PAD_RIGHT);
      $numero_primeira_casa = substr($numero, 0);

      if ($numero_completo < 1) continue;

      if ($numero_primeira_casa >= 1 and $numero_primeira_casa <= 3) {
        for ($increment_sub = 1; $increment_sub <= $numero_primeira_casa; $increment_sub++) {

          if ($numero_completo <= 3999) {
            $numero_1 = str_pad(1, ((int) $numero_qtd + 1), '0', STR_PAD_RIGHT);
          }

          if ($numero_completo >= 10000) {
            $numero_1 = str_pad(1, ((int) $numero_qtd - 3) + 1, '0', STR_PAD_RIGHT);
          }

          foreach ($tabela_conversao as $key => $value) {
            if ($value == $numero_1) {
              $resultado .= $key;
            }
          }
        }

        if ($numero_completo > 3999) {
          $resultado = '<span style="text-decoration: overline">' . $resultado . '</span>';
        }
      }

      if ($numero_primeira_casa == 4) {
        $numero_1 = 1;
        $numero_5 = 5;

        if ($numero_completo < 4000) {
          $numero_1 = str_pad(($numero_1), ((int) $numero_qtd + 1), '0', STR_PAD_RIGHT);
          $numero_5 = str_pad($numero_5, ((int) $numero_qtd + 1), '0', STR_PAD_RIGHT);
        }

        if ($numero_completo >= 40000) {
          $numero_1 = str_pad(($numero_1), ((int) $numero_qtd - 3) + 1, '0', STR_PAD_RIGHT);
          $numero_5 = str_pad($numero_5, ((int) $numero_qtd - 3) + 1, '0', STR_PAD_RIGHT);
        }

        foreach ($tabela_conversao as $key => $value) {
          if ($value == $numero_1) {
            $resultado .= $key;
          }

          if ($value == $numero_5) {
            $resultado .= $key;
          }
        }

        if ($numero_completo > 3999) {
          $resultado = '<span style="text-decoration: overline">' . $resultado . '</span>';
        }
      }

      if ($numero_primeira_casa >= 5 and $numero_primeira_casa <= 8) {
        $numero_5 = 5;

        if ($numero_completo < 5000) {
          $numero_5 = str_pad($numero_5, ((int) $numero_qtd + 1), '0', STR_PAD_RIGHT);
        }

        if ($numero_completo >= 50000) {
          $numero_5 = str_pad($numero_5, ((int) $numero_qtd - 3) + 1, '0', STR_PAD_RIGHT);
        }

        foreach ($tabela_conversao as $key => $value) {
          if ($value == $numero_5) {
            $resultado .= $key;
          }
        }

        if ($numero_completo > 3999) {
          $resultado = '<span style="text-decoration: overline">' . $resultado . '</span>';
        }
      }

      if ($numero_primeira_casa >= 6 and $numero_primeira_casa <= 8) {
        if ($numero_primeira_casa == 6) {
          $sub = 1;
        } elseif ($numero_primeira_casa == 7) {
          $sub = 2;
        } elseif ($numero_primeira_casa == 8) {
          $sub = 3;
        }

        if ($numero_completo < 5000) {
          $numero_final = str_pad(1, ((int) $numero_qtd + 1), '0', STR_PAD_RIGHT);
        } elseif ($numero_completo >= 50000) {
          $numero_final = str_pad(1, ((int) $numero_qtd - 3) + 1, '0', STR_PAD_RIGHT);
        } else {
          $numero_final = str_pad(1, 1, '0', STR_PAD_RIGHT);
        }

        for ($increment_sub = 1; $increment_sub <= $sub; $increment_sub++) {
          foreach ($tabela_conversao as $key => $value) {
            if ($value == $numero_final) {
              $resultado .= $key;
            }
          }
        }

        if ($numero_completo > 3999) {
          $resultado = '<span style="text-decoration: overline">' . $resultado . '</span>';
        }
      }

      if ($numero_primeira_casa == 9) {
        $numero_1 = 1;
        $numero_10 = 10;

        if ($numero_completo < 9000) {
          $numero_1 = str_pad($numero_1, ((int) $numero_qtd + 1), '0', STR_PAD_RIGHT);
          $numero_10 = str_pad($numero_10, (int) $numero_qtd + 2, '0', STR_PAD_RIGHT);
        }

        if ($numero_completo >= 90000) {
          $numero_1 = str_pad($numero_1, ((int) $numero_qtd - 3) + 1, '0', STR_PAD_RIGHT);
          $numero_10 = str_pad($numero_10, ((int) $numero_qtd - 3) + 2, '0', STR_PAD_RIGHT);
        }

        foreach ($tabela_conversao as $key => $value) {
          if ($value == $numero_1) {
            $resultado .= $key;
          }

          if ($value == $numero_10) {
            $resultado .= $key;
          }
        }

        if ($numero_completo > 3999) {
          $resultado = '<span style="text-decoration: overline">' . $resultado . '</span>';
        }
      }
    endforeach;

    return [
      'error' => false,
      'result' => $resultado
    ];
  }
}
