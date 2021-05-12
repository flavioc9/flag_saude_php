<?php

class Database{


    private const HOST = '127.0.0.1';
    private const USER = 'playground_user';
    private const PASS = 'password';
    private const DB = 'flag_saude_v2';


    private static $connection;


    private function __construct() {
        // para não permitir instanciação fora da class
    }

    public static function bdConnect(): mysqli {

        if(self::$connection === null){
            $db = new mysqli(self::HOST, self::USER, self::PASS, self::DB);
            if(!$db->connect_error){
                self::$connection = $db;
            }
        }
        return self::$connection;
    }

}



?>