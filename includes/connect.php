<?php

try {
    if (class_exists('PDO')) {

        $dsn = 'mysql:dbname=' . _DB . ';host=' . _HOST;

        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // Set utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // TẠO THÔNG BÁO RA NGOẠI LỆ
        ];

        $con = new PDO($dsn, _USER, _PASS, $option);
    }
} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    die();
}
