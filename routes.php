<?php
$routes = [
  '/'         => ['MainController', 'home'],
  'contacts'  => ['MainController', 'contacts'],
   
  'loremIpsum' => ['MainController', 'loremIpsum'], // Добавлен маршрут для страницы "Lorem Ipsum"

  'send-mail' => ['MainController', 'sendMail'],
  'categories'=> ['CategoryController', 'index'],
  'categories/create' => ['CategoryController', 'create'],
  'categories/save' => ['CategoryController', 'save'],
  'categories/edit/(\d+)' => ['CategoryController', 'edit'],
  'categories/update/(\d+)' => ['CategoryController', 'update'],
  'categories/remove/(\d+)' => ['CategoryController', 'remove'], //DZ 06.09

  'products' => ['ProductController', 'index'], // Страница с товарами
  'products/create' => ['ProductController', 'create'], // Страница добавления товара
  'products/save' => ['ProductController', 'save'], // Обработчик сохранения товара
   

  'download-products-to-excel' => ['MainController', 'downloadProductsToExcel'], //DZ 08.09

  'products-to-pdf' => ['MainController', 'productsToPdf'],
  'parser' => ['MainController', 'parser'],
];