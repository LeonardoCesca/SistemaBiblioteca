<?php
	include("conexao.php");

	if (isset($_POST['entrar'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$verifica = mysqli_query($conexao_livros, "SELECT * FROM usuarios WHERE email = '$email' AND password='$pass'");
		if (mysqli_num_rows($verifica)<=0) {
			echo "<h3>Senha ou e-mail errados!</h3>";
		}else{
			$resultado = mysqli_fetch_array($verifica);
			session_start();
			$_SESSION['usuario_id'] = $resultado['id'];
			$_SESSION['usuario_nome'] = $resultado['nome'];
			header("location:buscar.php");
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
	form{text-align: center; margin-top: 20px;}
	input[type="email"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px;}
	input[type="password"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; margin-top: 10px; border-radius: 3px;}
	input[type="submit"]{border: none; width: 80px; height: 30px; margin-top: 20px; border-radius: 3px;}
	input[type="submit"]:hover{background-color: #1E90FF; color: #FFF; cursor: pointer;}
	h2{text-align: center; margin-top: 20px;}
	h3{text-align: center; color: #1E90FF; margin-top: 15px;}
	a{text-decoration: none; color: #333;}
	</style>
</head>
<body>
	<img src="img/livros.png"><br />
	<h2>Entre com sua conta</h2>
	<form method="POST">
		<input type="email" placeholder="Endereço email" name="email"><br />
		<input type="password" placeholder="Senha" name="pass"><br />
		<input type="submit" value="Entrar" name="entrar">
	</form>
	<h3>Ainda não possui conta? <a href="registar.php">Crie uma!</a></h3>
</body>
</html>