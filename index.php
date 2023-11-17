<?php
session_start();
require_once("php/dbconnect.php");
$email= $_SESSION['email'];
if (!isset($_SESSION["email"]) && !isset($_SESSION["password"]))
    header("Location: http://localhost/test/auth.php")
?>
<?php 
$res = $mysqli->query("SELECT * FROM `users` WHERE email = '".$email."'" );
$rowa = mysqli_fetch_array($res, MYSQLI_ASSOC);
    if ($rowa['type'] != null)  header("Location: http://localhost/test/dash/dash.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1">
        <title>Survey Form</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form class="survey-form" method="post" action="php/check.php">      
        <h1><i class="far fa-list-alt"></i>Небольшой опрос</h1>

<div class="steps">
    <div class="step current"></div>
    <div class="step"></div>

    
</div>
<div class="step-content current" data-step="1">
    <div class="fields">
        <p>Ваш курс:</p>
        <div class="rating">
            <input type="radio" name="rating" id="radio1" value="1">
            <label for="radio1">1</label>
            <input type="radio" name="rating" id="radio2" value="2">
            <label for="radio2">2</label>
            <input type="radio" name="rating" id="radio3" value="3">
            <label for="radio3">3</label>
            <input type="radio" name="rating" id="radio4" value="4">
            <label for="radio4">4</label>
        </div>
        <p>Предпочитаемое направление:</p>
        <div class="group">
            <label for="radio6">
                <input type="radio" name="type" id="radio6" value="bus">
                Экономика
            </label>
            <label for="radio7">
                <input type="radio" name="type" id="radio7" value="it">
                Информационные технологии
            </label>
        </div>                  
    </div>
    <div class="buttons">
        <button class="btn" type="submit">Далее</button>
       
    </div>
</div>
</form>
</body>
</html>