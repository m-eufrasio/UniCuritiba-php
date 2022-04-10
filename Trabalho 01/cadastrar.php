<!DOCTYPE html>
<html>

<head>
    <title> Cadastrar </title>
    <link rel="stylesheet" href="css/estiloCadastro.css">
    <?php include('config.php');  ?>
</head>

<body>
    <?php
    $id = @$_REQUEST['id'];

	if (@$_REQUEST['id'] and !@$_REQUEST['botao']) {

		$query = "
		SELECT * FROM usuario WHERE id='{$_REQUEST['id']}'
	";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);

		if (is_array($row) && count($row) > 0) {
			foreach ($row as $key => $value) {
				$_POST[$key] = $value;
			}
		}
	}

    if (@$_REQUEST['botao'] == "Gravar") {
        
        @$senha = $_POST['senha'];

        if (!$_REQUEST['id']) {
            $insere = "INSERT into usuario (nome, login, senha, nivel) VALUES ('{$_POST['nome']}', '{$_POST['login']}', '$senha', '{$_POST['nivel']}')";
            $result_insere = mysqli_query($con, $insere);

            if ($result_insere) echo "<h2> Registro inserido com sucesso!!!</h2>";
            else echo "<h2> Nao consegui inserir!!! </h2>";
        } else {
            $insere = "UPDATE usuario SET 
					login = '{$_POST['login']}'
                    , nome = '{$_POST['nome']}'
					, senha = '{$_POST['senha']}'
					, nivel = '{$_POST['nivel']}'
					WHERE id = '{$_REQUEST['id']}'
				";
            $result_update = mysqli_query($con, $insere);

            if ($result_update) echo "<h2> Registro atualizado com sucesso!!!</h2>";
            else echo "<h2> Nao consegui atualizar!!!</h2>";
        }
    }
    ?>
    <?php
    require('verifica.php');
    if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='menu.php';</script>";
    ?>
    <div>
        <div>
            <label class="ola"><?php echo $_SESSION["login_usuario"]; ?> - Cadastrar usuarios</label>
            
            <div  class="divMenuSair">
                <button onclick="window.location.href = 'menu.php'" class="sair"> Menu </button>
                <hr>
                <button onclick="window.location.href = 'logout.php'" class="sair"> Sair </button>
            </div>
        </div>
    </div>
    <!-- <font size=7 color=red> Entrei no Cadastro - <?php echo $_SESSION["login_usuario"]; ?></font>
    <hr> -->
    <br>
    <div class="conteudo">
        <div class="background">
            <form class="formulario" action=# method=POST name="cadastrar">

                <div>
                    <label for="">Nome: </label>
                    <input type="text" class="campoCadastro" name="nome" required value="<?php echo @$_POST['nome']; ?>">
                </div><br>

                <div>
                    <label for="">Login: </label>
                    <input type="text" class="campoCadastro" name="login" required value="<?php echo @$_POST['login']; ?>">
                </div><br>

                <div>
                    <label for="">Senha: </label>
                    <input type="text" class="campoCadastro" name="senha" required value="<?php echo @$_POST['senha']; ?>">
                </div>
                <br>

                <div>
                    <label for="">Nivel: </label>
                    <input type="text" class="campoCadastro" name="nivel" required value="<?php echo @$_POST['nivel']; ?>">
                </div>

                <br>
                <div>
                    <input type="submit" value="Gravar" class="btn-gravar" name="botao">
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo @$_REQUEST['id'] ?>" />
                </div>
            </form>
        </div>
    </div>

</body>

</html>