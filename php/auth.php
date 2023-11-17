<?php
require_once("dbconnect.php");
session_start();
    
   
 
$email = trim($_POST["login-email"]);
if(isset($_POST["login-email"])){
 
    if(!empty($email)){
        $email = htmlspecialchars($email, ENT_QUOTES);
 
        //Проверяем формат полученного почтового адреса с помощью регулярного выражения
        $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";
 
        //Если формат полученного почтового адреса не соответствует регулярному выражению
        if( !preg_match($reg_email, $email)){
            // Сохраняем в сессию сообщение об ошибке. 
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Вы ввели неправильный email</p>";
             
            //Возвращаем пользователя на страницу авторизации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/auth.php");
 
            //Останавливаем скрипт
            exit();
        }
    }else{
        // Сохраняем в сессию сообщение об ошибке. 
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Поле для ввода почтового адреса(email) не должна быть пустой.</p>";
         
        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/auth.php");
 
        //Останавливаем скрипт
        exit();
    }
     
 
}else{
    // Сохраняем в сессию сообщение об ошибке. 
    $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода Email</p>";
     
    //Возвращаем пользователя на страницу авторизации
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/auth.php");
 
    //Останавливаем скрипт
    exit();
}
 
if(isset($_POST["login-password"])){
 
    //Обрезаем пробелы с начала и с конца строки
    $password = trim($_POST["login-password"]);
 
    if(!empty($password)){
        $password = htmlspecialchars($password, ENT_QUOTES);
 
        //Шифруем пароль
        $password = md5($password."gas");
    }else{
        // Сохраняем в сессию сообщение об ошибке. 
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Укажите Ваш пароль</p>";
         
        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/auth.php");
 
        //Останавливаем скрипт
        exit();
    }
     
}else{
    // Сохраняем в сессию сообщение об ошибке. 
    $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода пароля</p>";
     
    //Возвращаем пользователя на страницу регистрации
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/auth.php");
 
    //Останавливаем скрипт
    exit();
}
 //Запрос в БД на выборке пользователя.
$result_query_select = $mysqli->query("SELECT * FROM `users` WHERE email = '".$email."' AND password = '".$password."'" );
 
if(!$result_query_select){
    // Сохраняем в сессию сообщение об ошибке. 
    $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на выборке пользователя из БД</p>";
     
    //Возвращаем пользователя на страницу регистрации
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/auth.php");
 
    //Останавливаем скрипт
    exit();
}else{
 
    
    if($result_query_select->num_rows == 1){
        
        $mysqli->query("SELECT name FROM `users` WHERE email = '".$email."'" );
        $_SESSION['name'] = $mysqli->use_result();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        
        
 
        //Возвращаем пользователя на главную страницу
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/index.php");
 
    }else{
         
        // Сохраняем в сессию сообщение об ошибке. 
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный логин и/или пароль</p>";
         
        //Возвращаем пользователя на страницу авторизации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/auth.php");
 
        //Останавливаем скрипт
        exit();
    }
}
