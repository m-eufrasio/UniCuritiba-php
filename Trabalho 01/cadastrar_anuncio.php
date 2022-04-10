<!DOCTYPE html>
<html>

<head>
    <title> Publicar anúncio </title>
    <link rel="stylesheet" href="css/estiloCadastro.css">
    <?php include('config.php');  ?>
</head>

<body>
    <?php
    $id = @$_REQUEST['id'];

	if (@$_REQUEST['id'] and !@$_REQUEST['botao']) {

		$query = " SELECT * FROM anuncios WHERE id='{$_REQUEST['id']}' ";
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
            $insere = "INSERT into anuncios (titulo, cat_anuncio, preco, status) VALUES ('{$_POST['titulo']}',
                                                                                         '{$_POST['cat_anuncio']}',
                                                                                         '{$_POST['preco']}',
                                                                                         '{$_POST['status']}')";
            $result_insere = mysqli_query($con, $insere);

            if ($result_insere) echo "<h2> Anúncio efetuado com sucesso! </h2>";
            else echo "<h2> Não foi possível efetuar o anúncio! Por favor, tente novamente. </h2>";
        } else {
            $insere = "UPDATE anuncios SET 
					titulo = '{$_POST['titulo']}'
                    , preco = '{$_POST['preco']}'
					, status = '{$_POST['status']}'
                    , cat_anuncio = '{$_POST['cat_anuncio']}'
					WHERE id = '{$_REQUEST['id']}'
				";
            $result_update = mysqli_query($con, $insere);

            if ($result_update) echo "<h2> Anúncio atualizado com sucesso! </h2>";
            else echo "<h2> Não foi possível efetuar a atualização do anúncio. </h2>";
        }
    }
    ?>
    <?php
    require('verifica.php');
    if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='menu.php';</script>";
    ?>
    <div>
        <div>
            <label class="ola"><?php echo $_SESSION["nome_usuario"]; ?> - Anunciar </label>
            
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
                    <label for=""> Título: </label>
                    <input type="text" class="campoCadastro" name="titulo" required value="<?php echo @$_POST['titulo']; ?>">
                </div><br>

                <div>
                    <label for=""> Preço: </label>
                    <input type="text" class="campoCadastro" name="preco" required value="<?php echo @$_POST['preco']; ?>">
                </div><br>

                <div>
                    <label for=""> Categoria: </label>
                    <!-- Criar um foreach para listar todas as categorias do BANCO -->
                    <select name="cat_anuncio" id="cat_anuncio">
                        <option value=""> teste </option>
                    </select>
                </div><br>

                <div>
                    <label for=""> Status: </label>
                    Ativo: <input type="radio" class="campoCadastro" name="status" required value="Ativo" >
                    Inativo: <input type="radio" class="campoCadastro" name="status" required value="Inativo" >
                </div><br>

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