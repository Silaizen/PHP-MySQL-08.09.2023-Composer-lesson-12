<?php
namespace Core\Controllers;

abstract class Controller{
  public static function redirect(string $path): void{
    header("Location: $path");
    exit;
  }

  public static function dump($obj): void
  {
    echo '<pre>' . print_r($obj, true) . '</pre>';
  }
}