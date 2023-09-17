<?php
namespace Core\Models;

use Services\Db;

class Category extends Model
{

    public $id;
    public $name;
   
    public static function getTable()
    {
        return 'categories';
    }

}






/*
class Category{

    public static function all()
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM categories', [], self::class);
    }

}

*/