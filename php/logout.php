<?php
  
    session_start();
 
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    unset($_SESSION["end"]);

    header("HTTP/1.1 301 Moved Permanently");
    header("Location: http://localhost/test/auth.php")
?>