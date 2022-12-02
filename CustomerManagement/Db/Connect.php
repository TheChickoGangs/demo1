<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'customer_db';

    $connect = new mysqli($host,$username,$password,$dbname);
    if($connect->connect_error)
    {
        die("False to Connect to MySql!!!");
    }
?>