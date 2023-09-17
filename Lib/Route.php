<?php
namespace Lib;


use Core\Controllers\Controller;

class Route{
  public static function start() : void {
    $url = $_GET['url'] ?? '/'; // '/'
    //echo $url . '<br>';

    require_once './routes.php'; // $routes = []
         
    /*
     if( !isset($routes[$url]) ){
      echo 'Page Not Found';
      exit;
    }
    */

    $isRouteFound = false;

    foreach($routes as $pattern => $controllerAndMethod){
      preg_match('~^' . $pattern . '$~', $url, $matches);
      if(!empty($matches)){
        $isRouteFound = true;
        break;
      }
    }

    if(!$isRouteFound){
      die('Page not Found');
    }


    list($ctrlName, $ctrlMethod) = $controllerAndMethod; // list($ctrlName, $ctrlMethod) = ['MainController', 'home']
    //echo $ctrlName . '------' . $ctrlMethod . '<br>';

    if( !file_exists("Core/Controllers/$ctrlName.php") ){
      die("Controller $ctrlName not Found");
    }

    $controller = new ("\\Core\\Controllers\\$ctrlName")();
    
    if( !method_exists($controller, $ctrlMethod)){
      die("Method $ctrlMethod in controller $ctrlName Not Found");
    }

    unset($matches[0]);

    //Controller::dump($matches);

    $controller->$ctrlMethod(...$matches);


  }
}