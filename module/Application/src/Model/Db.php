<?php
namespace Application\Model;

use PDO;

class Db {
    private static $connection;

    public static function getConnection(){
        if(self::$connection == null){
            self::$connection = new PDO("mysql:host=example.loc;dbname=ToDoList", 'user', 'user');
            self::$connection->exec("set names utf8");
        }
        return self::$connection;
    }
}
