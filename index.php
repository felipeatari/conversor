<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Router;
use App\Template;

$app = new App\Router();

$app->get('/', 'Home->index');
$app->get('/teste', 'Teste->index');
$app->post('/api/numero_para_algarismo/{numero}', function($numero) {
  return App\Controllers\ApiConversorController::numero_para_algarismo($numero);
});
$app->post('/api/algarismo_para_numero/{algarismo}', function($algarismo) {
  return App\Controllers\ApiConversorController::algarismo_para_numero($algarismo);
});

$content = $app?->on()?->dispatcher();

Template::layout(content: $content);