<?php

    define('HOST', 'localhost');
    define('DB_NAME' , 'nfa083');
    define('USER' , 'root');
    define('PASS' , '');


    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND  => "SET NAMES utf8"));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        echo $e;
        die();
    }
?>