<?php

namespace App;

class Template
{
  private static string $title = '';
  private static string $main = '';
  private static string $admin = '';
  private static string $error = '';

  /**
   * Método responsável por carregar o título da página atual
   *
   * @param string $title Título da página atual
   *
   * @return void
   */
  public static function title(string $title = null): void
  {
    self::$title = $title;
  }

  public static function main(string $main = ''): void
  {
    self::$main = $main;
  }

  public static function admin(string $admin = ''): void
  {
    self::$admin = $admin;
  }

  public static function error(string $error = ''): void
  {
    self::$error = $error;
  }

  /**
   * Carrega arquivos PHP
   *
   * @param string $path_file Caminho do arquivos
   * @param array $vars_dynamic Dados que serão carregados dinamicamente
   *
   * @return string
   */
  private static function load_file_php(string $path_file, array $vars_dynamic = []): string
  {
    if (! empty($vars_dynamic)) extract($vars_dynamic);

    ob_start();
    require_once __DIR__ . '/../' . $path_file;
    $load_file = ob_get_contents();
    ob_clean();

    return $load_file;
  }

  /**
   * Método responsável por renderizar a view
   *
   * @param string $extension Extensão do arquivo da visão: .php ou .html
   * @param array $vars_dynamic Dados que serão carregados dinamicamente
   *
   * @return string Página com os campos substituídos
   */
  public static function view(array $vars_dynamic = []): ?string
  {
    if (self::$main) {
      $view = 'resources/views/' . self::$main . '.php';
    }
    elseif (self::$admin) {
      $view = 'resources/views/' . self::$admin . '.php';
    }
    elseif (self::$error) {
      $view = 'resources/views/' . self::$error . '.php';
    }
    else {
      return null;
    }

    if (! file_exists($view)) return null;

    return self::load_file_php($view, $vars_dynamic);
  }

  /**
   * Método responsável por carregar o layout
   *
   * @param string $content Recebe o conteúdo da página
   *
   * @return string
   */
  public static function layout(string $layout = 'main', ?string $content = '')
  {
    if ($layout === 'admin') {
      $view = self::$admin;
    }
    else {
      $view = self::$main;
    }

    $layout_css = '/resources/assets/css/layouts/' . $layout . '.css';

    if (! file_exists($layout_css)) $layout_css = null;

    $layout_js = '/resources/assets/js/layouts/' . $layout . '.js';

    if (! file_exists($layout_js)) $layout_js = null;

    $view_css = '/resources/assets/css/views/' . $view . '.css';

    if (! file_exists($view_css)) $view_css = null;

    $view_js = '/resources/assets/js/views/' . $view . '.js';

    // if (! file_exists(rtrim($view_js, '/'))) $view_js = null;

    $layout = 'resources/layouts/' . $layout . '.php';

    if (! file_exists($layout)) return null;

    $template = self::load_file_php($layout, [
      'layout_title' => self::$title,
      'layout_css' => $layout_css,
      'layout_js' => $layout_js,
      'view_css' => $view_css,
      'view_js' => $view_js,
      'content' => $content
    ]);

    // Renderiza em linha e sem espaço entre as tags
    $template = str_replace("\n", "", $template);
    $template = preg_replace('/\s+/', ' ', trim($template));
    $template = str_replace('> <', '><', $template);

    echo $template;die;
  }
}