<!DOCTYPE html>
<html>

<head>
    <title> Cadastrar </title>
    <link rel="stylesheet" href="css/estiloCadastro.css">
    <?php include('config.php');  ?>
</head>

<body>
    <?php
   $id_usuario = @$_REQUEST['id_usuario'];

	if (@$_REQUEST['id_usuario'] and !@$_REQUEST['botao']) {

		$query = "
		SELECT * FROM usuario WHERE id_usuario='{$_REQUEST['id_usuario']}'
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
        
        @$senha = md5 ($_POST['senha']);

        if (!$_REQUEST['id_usuario']) {
            $insere = "INSERT into usuario (nome, login, senha, nivel) VALUES ('{$_POST['nome']}', '{$_POST['login']}', '$senha', '{$_POST['nivel']}')";
            $result_insere = mysqli_query($con, $insere);

            if ($result_insere) {
                print '<script> alert("Registro inserido com sucesso!") </script>';
                print '<script type="text/JavaScript">  </script>';
            }
            else print '<script> alert("Nao consegui inserir!") </script>';
        } else {
            $insere = "UPDATE usuario SET 
					login = '{$_POST['login']}'
                    , nome = '{$_POST['nome']}'
					, senha = '$senha'
					, nivel = '{$_POST['nivel']}'
					WHERE id_usuario ='$id_usuario'
				";
            $result_update = mysqli_query($con, $insere);

            if ($result_update) print '<script> alert("Registro atualizado com sucesso!") </script>';
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
      
            <label class="ola"> Olá <?php echo $_SESSION["nome_usuario"]; ?> - Cadastrar usuarios </label>
            
          
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
                    ADM: <input type="radio" class="campoCadastro" name="nivel" required value= "ADM">
                    USER: <input type="radio" class="campoCadastro" name="nivel" required value="USER" >
                 
                </div>

                <br>
                <div >
                    <input type="submit" value="Gravar" class="btn-gravar" name="botao">
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo @$_REQUEST['id'] ?>" />
                </div>
            </form>
        </div>
    </div>
    <div  class="divMenuSair">
                <button onclick="window.location.href = 'menu.php'" class="menu"> Menu </button>
              
            </div>
</body>

</html>