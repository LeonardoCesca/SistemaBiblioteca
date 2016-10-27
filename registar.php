<?php
	include("conexao.php");

	if (isset($_POST['criar'])) {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$data = date("Y/m/d");

		$email_check = mysqli_query($conexao_livros, "SELECT email FROM usuarios WHERE email='$email'");
		$do_email_check = mysqli_num_rows($email_check);
		if ($do_email_check >= 1) {
			echo '<h3>Email já registrado, faz o login <a href="login/login.php">aqui</a></h3>';
		}elseif ($nome == '' OR strlen($nome)<3) {
			echo '<h3>Escreva seu nome corretamente!</h3>';
		}elseif ($email == '' OR strlen($email)<10) {
			echo '<h3>Email Inválido!</h3>';
		}elseif ($pass == '' OR strlen($pass)<8) {
			echo '<h3>Sua senha deve conter mais que 8 caracteres!</h3>';
		}else{
			$query = "INSERT INTO usuarios (`nome`,`email`,`password`,`data`) VALUES ('$nome','$email','$pass','$data')";
			$data = mysqli_query($conexao_livros, $query) or die(mysql_error());
			if ($data) {
				setcookie("login",$email);
				header("Location: ./login.php");
			}else{
				echo "<h3>Erro ao se registrar</h3>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	*{font-family: 'Montserrat', cursive;}
	img{display: block; margin: auto; margin-top: 20px; width: 200px;}
	form{text-align: center; margin-top: 10px;}
	input[type="text"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px; margin-top: 10px;}
	input[type="email"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px; margin-top: 10px;}
	input[type="password"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; margin-top: 10px; border-radius: 3px;}
	input[type="submit"]{border: none; width: 120px; height: 30px; margin-top: 20px; border-radius: 3px;}
	input[type="submit"]:hover{background-color: #1E90FF; color: #FFF; cursor: pointer;}
	h2{text-align: center; margin-top: 20px;}
	h3{text-align: center; color: #1E90FF; margin-top: 15px;}
	a{text-decoration: none; color: #333;}
	</style>
</head>
<body>
	<img src="img/livros.png"><br />
	<h2>Crie sua conta</h2>
	<form method="POST">
		<input type="text" placeholder="Nome" name="nome"><br />
		<input type="email" placeholder="Endereço email" name="email"><br />
		<input type="password" placeholder="Senha" name="pass"><br />
		<input type="submit" value="Criar uma conta" name="criar">
	</form>
	<h3>Já possui uma conta? <a href="login.php">Entre aqui!</a></h3>
</body>
</html>