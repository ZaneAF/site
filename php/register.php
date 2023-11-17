<?php
   
    session_start();
 
    
    require_once("dbconnect.php");
 
  
    $_SESSION["error_messages"] = '';

    $_SESSION["success_messages"] = '';
?>
<?php
    /*
        Проверяем была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том что он зашёл на эту страницу напрямую.
    */
    
 
        /* Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/
 
if(isset($_POST["signup-name"])){
     
   
    $name = trim($_POST["signup-name"]);
 

    if(!empty($name)){
       
        $name = htmlspecialchars($name, ENT_QUOTES);
    }else{
   
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваше имя</p>";
 
       
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/auth.php");
 
   
        exit();
    }
 
   
$result_query = $mysqli->query("SELECT `name` FROM `users` WHERE `name`='".$name."'");
 

if($result_query->num_rows == 1){
 
   
    if(($row = $result_query->fetch_assoc()) != false){
         
          
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Пользователь с таким ником уже зарегистрирован</p>";
             
           
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/auth.php");
         
    }else{
       
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка в запросе к БД</p>";
         
   
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/auth.php");
    }
 
  
    $result_query->close();
 
    //Останавливаем  скрипт
    exit();
     
}
}
 

 
if(isset($_POST["signup-email"])){
 
   
    $email = trim($_POST["signup-email"]);
 
    if(!empty($email)){
 
        $email = htmlspecialchars($email, ENT_QUOTES);
 
       
$reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";
 

if( !preg_match($reg_email, $email)){
  
    $_SESSION["error_messages"] .= "<p class='mesage_error' >Вы ввели неправельный email</p>";
     
  
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/auth.php");
 
  
    exit();
}

$result_query = $mysqli->query("SELECT `email` FROM `users` WHERE `email`='".$email."'");
 

if($result_query->num_rows == 1){
 

    if(($row = $result_query->fetch_assoc()) != false){
         
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Пользователь с таким почтовым адресом уже зарегистрирован</p>";
             
          
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/auth.php");
         
    }else{
      
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка в запросе к БД</p>";
         
     
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/auth.php");
    }
 
    
    $result_query->close();
 

    exit();
}
 


    }else{
       
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш email</p>";
     
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/auth.php");
 
     
        exit();
    }
 
}else{
   
    $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода Email</p>";
  
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/auth.php");
 
  
    exit();
}
 
 
if(isset($_POST["signup-password"])){
 
 
    $password = trim($_POST["signup-password"]);
 
    if(!empty($password)){
        $password = htmlspecialchars($password, ENT_QUOTES);
 
      
        $password = md5($password."gas"); 
    }else{
        
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш пароль</p>";
         
       
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/auth.php");
 
  
        exit();
    }
 
}else{
 
    $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода пароля</p>";
     
   
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/auth.php");
 
   
    exit();
}


$result_query_insert = $mysqli->query("INSERT INTO `users` (name, email,password) VALUES ('".$name."', '".$email."', '".$password."')");
 
if(!$result_query_insert){
   
    $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";
   
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/auth.php");
 
   
    exit();
}else{
 
    $_SESSION["success_messages"] = "<p class='success_message'>Регистрация прошла успешно!!! <br />Теперь Вы можете авторизоваться используя Ваш логин и пароль.</p>";
 
 
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/auth.php");
}
 

$result_query_insert->close();
 

$mysqli->close();
     
   

?>