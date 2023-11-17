<?php session_start();

   
    
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
         
            unset($_SESSION["error_messages"]);
        }
 
       
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
           
            unset($_SESSION["success_messages"]);
        }
        
if(isset($_SESSION["email"]) && isset($_SESSION["password"])){ header("Location: http://localhost/index.php"); die(); }else{?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="auth/style.css">

</head>
<body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="php/register.php" method="post">
			<h1>Регистрация</h1>
			<input name="signup-name" type="text" placeholder="Имя" required />
			<input name="signup-email" type="email" placeholder="Email" required />
			<input name="signup-password" type="password" placeholder="Пароль" required />
			<button type="submit">Зарегистрироваться</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="php/auth.php" method="post">
			<h1>Вход</h1>
			<input name="login-email" type="email" placeholder="Email" required />
			<input name="login-password" type="password" placeholder="Пароль" required />
			<button type="submit">Войти</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>С возвращением</h1>
				<p>Нажмите ниже, чтобы войти</p>
				<button class="ghost" id="signIn">Вход</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Приветствуем!</h1>
				<p></p>
				<button class="ghost" id="signUp">Регистрация</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</body>
</html>
<?php }?>