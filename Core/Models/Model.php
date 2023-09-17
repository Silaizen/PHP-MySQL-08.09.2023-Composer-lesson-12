<?php
namespace Core\Models;

use Core\Controllers\Controller;
use Services\Db;


abstract class Model{

    protected $id;
    public static function all()
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM ' . static::getTable(), [], static::class);
    }

   public function save(){
    $db = Db::getInstance();

    $reflection = new \ReflectionObject($this);
    $properties = $reflection->getProperties();
    

    $props = [];
    $propsToUpdate = [];
    foreach($properties as $p){
        $name = $p->name;
        $props[$name] = $this->$name; // $props['name'] = 'test
        $propsToUpdate[] = $name . '=:' . $name;
    }

    //Controller::dump($props);
    if($this->id){
        $sql = 'UPDATE ' . static::getTable() . ' SET ' . implode(', ', $propsToUpdate) . ' WHERE id=:id';
       // echo $sql;
        // UPDATE categories SET name=:name
        // UPDATE products SET name=:name, price=:price, category_id=:category_id WHERE id=:id
    
    }
    else{
        $sql ='INSERT INTO ' . static::getTable() . '('. implode(', ', array_keys($props)) .') VALUES(:'. implode(', :', array_keys($props)).')';
    }
    $db->query($sql, $props);
    //echo $sql;
    //$db->query($sql, ['???']);
   }

    public static function find($id){
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE id=?';
        $result = $db->query($sql, [$id], static::class);
        return $result ? $result[0] : null;
    }


    abstract public static function getTable();


    public function remove()
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM ' . static::getTable() . ' WHERE id=:id';
        $db->query($sql, ['id' => $this->id]);
    }


}