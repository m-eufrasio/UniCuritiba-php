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
        


        if (!$_REQUEST['id']) {
            $insere = "INSERT into categoria (area) VALUES ('{$_POST['area']}')";
            $result_insere = mysqli_query($con, $insere);

            if ($result_insere) {
                print '<script> alert("Categoria inserida com sucesso!") </script>';
                print '<script type="text/JavaScript">  </script>';
            }
            else print '<script> alert("Nao consegui inserir!") </script>';
        } 
    }
    ?>
    <?php
    require('verifica.php');
    if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='menu.php';</script>";
    ?>
    <div>
        <div>
      
            <label class="ola"> Olá <?php echo $_SESSION["nome_usuario"]; ?> - Cadastrar categoria </label>
        
          
        </div>
      
    </div>
    <!-- <font size=7 color=red> Entrei no Cadastro - <?php echo $_SESSION["login_usuario"]; ?></font>
    <hr> -->
    <br>
    <div class="conteudo">
        <div class="background">
            <form class="formulario" action=# method=POST name="cadastrar">

                <div>
                    <label for="">Nome da Categoria: </label>
                    <input type="text" class="campoCadastro" name="area" required value="<?php echo @$_POST['area']; ?>">
                </div>
           
                <br>
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