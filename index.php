<?php

use Lib\Route;

spl_autoload_register(function($class){
  $class = str_replace('\\', '/', $class);
  require_once "./$class.php";
});

require_once "./vendor/autoload.php";

session_start();


//Route::add('/lorem-ipsum', 'MainController@loremIpsum');


Route::start();