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
        <title>Небольшой опрос</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form class="survey-form" method="post" action="php/second_check.php">     
        <h1><i class="far fa-list-alt"></i>Небольшой опрос</h1>

<div class="steps">
    <div class="step"></div>
    <div class="step complete"></div>
    
</div>
<?php if($_SESSION['type'] == "bus"){ ?>
<div class="step-content current" data-step="2">
    <div class="fields">
        <p>Выберите интересующие вас предметы в разделе экономики:</p>
        <div class="group">
            <label for="radio1">
                <input type="radio" name="contact" id="radio1" value="pc">
                Управление проектами
            </label>
            <label for="radio2">
                <input type="radio" name="contact" id="radio2" value="eco">
                Моделирование бизнес-процессов
            </label>      
        </div>
    </div>
    <div class="buttons">
        <button class="btn" type="submit">Завершить</button>
    </div>
</div>
</form>
<?php } else { ?>
    <div class="step-content current" data-step="2">
    <div class="fields">
        <p>Выберите интересующие вас предметы в разделе информационных технологий:</p>
        <div class="group" required>
            <label for="radio1">
                <input type="radio" name="contact" id="radio1" value="ai">
                Искусственный интелект
            </label>
            <label for="radio2">
                <input type="radio" name="contact" id="radio2" value="db">
                Базы данных
            </label>     
        </div>
    </div>
    <div class="buttons">
        <button class="btn" type="submit">Завершить</button>
    </div>
</div>
        </form>

    </body>
</html>
<?php }?>