<?php

namespace App\Controllers;

use App\Template;

class ErrorController
{
  public static function error($code, $message)
  {
    Template::title('Erro ' . $code);
    Template::main('error');

    http_response_code($code);

    return Template::view([
      'code' => $code,
      'message' => $message
    ]);
  }

  public static function error_api($code, $message)
  {
    header('Content-Type: application/json');

    http_response_code($code);

    die(json_encode([
      'code' => $code,
      'message' => $message
    ]));
  }
}