<?php
namespace Services;

use PDO;
class Db{
    private $connect;
    private static $instance = null;


    private function __construct()
    {
        require_once './config.php';
        $this->connect = new PDO("mysql:host=" . HOST_DB . ";port=" . PORT_DB . ";dbname=". NAME_DB, USER_DB, PASS_DB);
    }


    public static function getInstance() : self {
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function query(string $sql, array $params = [], string $className = 'stdClass'){
        $stmt = $this->connect->prepare($sql);
        $result = $stmt->execute($params);
        return $result ? $stmt->fetchAll(PDO::FETCH_CLASS, $className) : null;
    }
}




