<?php

namespace Core\Controllers;

use Core\View;
use Lib\Message;
use Core\Models\Category;

class CategoryController extends Controller
{
public function index() : void{
   

    $categories = Category::all();
    //self::dump($categories);
    //$product = Product::all();
    //self::dump($product);

    View::render('category/index', compact('categories'));
}

function create() : void{
    View::render('category/create');
}


public function save(): void
{
    $name = $_POST['name'];

    $category = new Category();
    //$category->name = $name;
    //$category->save(); // БД создает новую категорию.
    
   
    $category->name = $name;
    $category->save();

    self::redirect('/categories');

}

public function edit($id) : void
{
    $category = Category::find($id);
    View::render('category/edit', compact('category'));
    //self::dump($category);
}

public function update($id): void{
    $name = $_POST['name'];
    $category = Category::find($id); //id->4 , name = 'test'
    $category->name = $name;
    $category->save();
    self::redirect('/categories');
}

public function remove($id){
   
    //DZ on 06.09
    $category = Category::find($id);
    $category->remove(); // Add function "remove()" in Model.php
    self::redirect('/categories'); 

    





}


}



/*
$category = new Category();
$category->name = 'fvbgdfg';
$category->save(); //DB create new category
*/

/*
$category = Category::find(1); // object class Category
$category->remove(); // delete from DB
*/