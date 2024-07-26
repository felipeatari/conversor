<?php

namespace App\Controllers;

use App\Template;

class HomeController
{
  public function index()
  {
    Template::title('Pagina Home');
    Template::main('home');

    return Template::view([
      'h1' => 'Projeto Conversor'
    ]);
  }
}