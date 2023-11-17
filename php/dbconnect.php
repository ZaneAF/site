<?php

    header('Content-Type: text/html; charset=utf-8');
 
    $server = "localhost"; // имя хоста 
    $username = "root"; // Имя пользователя БД
    $password = ""; // Пароль пользователя. 
    $database = "test"; // Имя базы данных, которую создали
    $dsn = "mysql:dbname=test;host=127.0.0.1";
    // Подключение к базе данных через MySQLi
    $mysqli = new mysqli($server, $username, $password, $database);
 
    // Проверяем, успешность соединения. 
    if ($mysqli->connect_errno) { 
        die("<p><strong>Ошибка подключения к БД</strong></p><p><strong>Код ошибки: </strong> ". $mysqli->connect_errno ." </p><p><strong>Описание ошибки:</strong> ".$mysqli->connect_error."</p>"); 
    }
 
    // Устанавливаем кодировку подключения
    $mysqli->set_charset('utf8');
 
    $address_site = "http://localhost/test";
?>