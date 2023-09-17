<?php
namespace Core;
class View{
  public static function render(string $path, array $data = []) : void {
    extract($data);
    unset($data);
    require_once './Core/Views/header.php';
    require_once "./Core/Views/$path.php";
    require_once './Core/Views/footer.php';
  }
}