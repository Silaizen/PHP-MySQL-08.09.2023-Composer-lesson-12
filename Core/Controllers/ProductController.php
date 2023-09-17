<?php
namespace Core\Controllers;

use Core\View;
use Core\Models\Product;

class ProductController extends Controller
{
    public function index(): void
    {
        $products = Product::all();
        View::render('product/index', compact('products'));
    }

    public function create(): void
    {
        View::render('product/create');
    }

    public function save(): void
    {
        // Обработка сохранения товара
        $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $product = new Product();
    $product->name = $name;
    $product->price = $price;
    $product->category_id = $category_id;
    $product->save();

    self::redirect('/products');
    }
}