<?php
include('config.php');
session_start(); // inicia a sessao	


if (@$_REQUEST['botao'] == "Entrar") {

	@$login = $_POST['login'];
	@$senha = md5($_POST['senha']);

	$query = " SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
	$result = mysqli_query($con, $query);

	while ($coluna = mysqli_fetch_array($result)) {

		$_SESSION["id_usuario"] = $coluna["id"];
		$_SESSION["nome_usuario"] = $coluna["login"];
		$_SESSION["UsuarioNivel"] = $coluna["nivel"];

		$niv = $coluna['nivel'];
		if ($niv == "USER") {
			header("Location: menu.php");
			exit;
		}

		if ($niv == "ADM") {
			header("Location: menu.php");
			exit;
		}
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/estiloLogin.css">
</head>

<body>
	<div id="login">

		<form class="card" action=# method=post>

			<div class="card-header">
				<h2>Login</h2>
			</div>

			<div class="card-content">
				<div class="card-content-area">
					<label for="usuario">Usuario</label>
					<input type="text" id="usuario" name="login" autocomplete="off">
				</div>

				<div class="card-content-area">
					<label for="password">Senha</label>
					<input type="password" id="password" name="senha" autocomplete="off">
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name=botao value=Entrar class="submit">
			</div>

		</form>

	</div>
</body>

</html>