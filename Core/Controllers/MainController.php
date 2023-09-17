<?php

namespace Core\Controllers;

use Core\Models\Product;
use Core\View;
use Lib\Message;
//use Sunra\PhpSimple\HtmlDomParcer;
//use simplehtmldom_1_5\simple_html_dom;
use PHPHtmlParser\Dom;


class MainController extends Controller
{
  public function home(): void
  {

    



    $title = 'Main Page';  // for 01.09 DZ like this
    $content = 'Some text';

    
     $products = Product::all();

    View::render('home', compact('title', 'content', 'products'));
  }



public function loremIpsum(): void
{
    $title = 'Lorem Ipsum';
    $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';

    View::render('loremIpsum', compact('title', 'content'));
}




  public function contacts(): void
  {
    View::render('contacts');
  }

  public function sendMail(): void
  {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if(!$name || !$phone || !$message){
      Message::set('Invalid', 'danger');
      self::redirect('/contacts');
    }

    // отправляем письмо
    Message::set('Thank');
    self::redirect('/contacts');
  }


   public function productsToPdf(): void{
    $products = Product::all();
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->SetHTMLHeader('
    <div style="position: absolute; right 5%;">
    {DATE j-m-Y}
    </div> ');
    $mpdf->SetHTMLFooter('
    <div style = "position: absolute; right: 50%">
    {PAGENO}
    </div>');
    // в шапке справа - выводить дату справа.
    // в footer посередине - выводить номер страницы.
    // выводить товары в ol. Название, цена, название категории.
    $mpdf->WriteHTML('<ol>');
    
      foreach($products as $product){
        $mpdf->WriteHTML("
        <div>
        <p>Product: {$product->name}</p>
        <p>Price: {$product->price} </p>
        <p>Category: {$product->getCategory()->name} </p>
        </div>
        ");
      }
    
    $mpdf->WriteHTML('</ol>');
    $mpdf->Output('products.pdf', "D");
    
   }

   public function parser(): void{
   $dom = new Dom;
   $dom->loadStr(file_get_contents('https://bestbuycase.com.ua'));
   //$dom->loadStr($str);
   $a = $dom->find('a')[0];
   self::dump($a->text);
   //echo $a->text; //"click here"

   }



   public function downloadProductsToExcel(): void
{
   
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="products.csv"');

    // открываем поток вывода
    $output = fopen('php://output', 'w');

    // Заголовки CSV файла
    fputcsv($output, ['Product Name', 'Price', 'Category']);

    // получаем товары и запишите их в CSV файл
    $products = Product::all();
    foreach ($products as $product) {
        fputcsv($output, [$product->name, $product->price, $product->getCategory()->name]);
    }

    // закрываем поток вывода
    fclose($output);

    // прерываем выполнение скрипта, чтобы предотвратить вывод другого контента
    exit();
}


}
