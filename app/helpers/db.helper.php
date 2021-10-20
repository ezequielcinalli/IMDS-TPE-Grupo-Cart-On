<?php
class DbHelper{
    function __construct(){}

    function connect() { 
        $db = new PDO('mysql:host=localhost;'.'dbname=imds_tpe;charset=utf8', 'root', '');
        return $db;
    }
}