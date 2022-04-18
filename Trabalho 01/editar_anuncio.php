<?php

$verificar = require('verifica.php');
include('config.php');
$id_anuncio = @$_REQUEST['id_anuncio'];
$id_usuario = @$_SESSION['id_usuario'];

if (@$_REQUEST['botao'] == "Gravar") {

    if (@$_REQUEST['id_anuncio']) {
        $insere = "UPDATE anuncios SET 
                        titulo = '{$_POST['titulo']}'
                        , preco = '{$_POST['preco']}'
                        , categoria_id = '{$_POST['categoria_id']}'
                        WHERE id_anuncio = '{$_REQUEST['id_anuncio']}'
                    ";
        $result_update = mysqli_query($con, $insere);

        if ($result_update) print '<script> alert("Anúncio atualizado com sucesso!") </script>';
        else print '<script> alert("Não foi possível efetuar a atualização do anúncio.") </script>';
    }
    else {
        print '<script> alert("Não foi possível efetuar a atualização do anúncio.") </script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Editar anúncio </title>
    <link rel="stylesheet" href="css/estiloCadastro.css">
</head>

<body>

    <?php if ($verificar) { ?>
        <label class="ola"> Olá <?php 
        print $_SESSION["nome_usuario"];  ?> - Editar </label>
    <?php }  ?>

    <br>
    <div class="conteudo">
        <div class="background">
            <form class="formulario" action=# method=POST name="cadastrar">

                <div>
                    <label for=""> Título: </label>
                    <input type="text" class="campoCadastro" name="titulo" required value="<?php print @$_POST['titulo']; ?>">
                </div><br>

                <div>
                    <label for=""> Preço: </label>
                    <input type="text" class="campoCadastro" name="preco" required value="<?php print @$_POST['preco']; ?>">
                </div><br>

                <div>
                    <label for=""> Categoria: </label>
                    <!-- While para trazer do banco todas as categorias disponíveis -->
                    <select name="categoria_id"id="categoria_id">
                        <option>
                            << Selecione >>
                        </option>
                        <?php
                        $result_categoria = " SELECT * FROM categoria ";
                        $resultados_categoria = mysqli_query($con, $result_categoria);
                        while ($row_categoria = mysqli_fetch_assoc($resultados_categoria)) { ?>
                            <option name="categoria_id" value="<?php print @$row_categoria['id']; ?>"> <?php print $row_categoria['area']; ?> </option> <?php
                                                                                                                                                                }
                                                                                                                                                                    ?>
                    </select>
                </div><br>

                <div>
                    <input type="submit" value="Gravar" class="btn-gravar" name="botao">
                    <br><br>
                    <input type="hidden" name="id" value="<?php print @$_REQUEST['id'] ?>" />
                </div>

            </form>

        </div>
    </div>

    <div class="divMenuSair">
        <button onclick="window.location.href = 'Menu.php'" class="menu"> Menu </button>

    </div>



</body>

</html>