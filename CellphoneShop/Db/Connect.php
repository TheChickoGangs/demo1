<?php
    define('DB_SERVER' , 'localhost');
    define('DB_USERNAME' , 'root');
    define('DB_PASSWORD' , '');
    define('DB_NAME' , 'cellphone_db');

    try
    {
        $connect = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME,DB_USERNAME,DB_PASSWORD);
    }
    catch(PDOException $e)
    {
        die("Cannot Connect to MySql" . $e->getMessage());
    }
?>