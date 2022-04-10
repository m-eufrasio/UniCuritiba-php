<!DOCTYPE html>
<html>

<head>
    <title> Anúncios </title>
    <link rel="stylesheet" href="css/estiloRelatorio.css">

    <?php
    include('config.php');
    
    $id = @$_REQUEST['id'];
    
    if (@$_REQUEST['botao'] == 'Excluir') {
        $query_excluir = " DELETE FROM anuncios WHERE id = $id ";

        $result_excluir = mysqli_query($con, $query_excluir);

        if ($result_excluir) print "<h2> Anúncio excluído com sucesso! </h2>";
        else print "<h2> Não foi possível excluir! </h2>";
    }
    
    ?>
</head>

<body>
    <div class="cabecalho">
        <div>
            <label class="ola"><?php require('verifica.php'); echo $_SESSION["nome_usuario"]; ?> - Anúncios </label>
            <button onclick="window.location.href = 'menu.php'" class="sair"> Menu </button>
            <button onclick="window.location.href = 'logout.php'" class="sair"> Sair </button>
        </div>
    </div>

    <div class="camposBusca">
        <form action="anuncios.php?botao=gravar" method="POST" name="form1">

            <div class="campos">
                <label for="" width="18%"> Código: </label>
                <input class="campdadosBusca" type="text" name="id">

                <label for="" width="18%"> titulo: </label>
                <input class="campdadosBusca" type="text" name="titulo">

                <label for="" width="18%"> Preço: </label>
                <input class="campdadosBusca" type="text" name="preco">

                <label for="" width="30%"> Categoria: </label>
                <select name="categoria" id="categoria">
                    
                    <option value="<?php  ?>"> Selecione </option>
                    <?php
                    @$query = " SELECT * FROM categorias WHERE id = '{$_REQUEST['id']}' ";

                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);

                    while($row) { 
                    ?>
                    <option value="<?php print $row['id']; ?>"> <?php print $row['area']; ?> </option>
                    <?php     
                    }
                    ?>

                </select>

                <label for="" width="18%"> Situação: </label>
                <input class="campdadosBusca" type="text" name="status">

                <button type="submit" name="botao" value="Gerar" class="btnGerar"> Buscar </button>

            </div>

        </form>
    </div>
    <br><br>

    <div class="camposBusca">
        <table class="tabela">
            <tr>
                <th> C&oacute;d </th>
                <th> Título </th>
                <th> Preço </th>
                <th> Status </th>
                <th> Categoria </th>
                <th> Editar </th>
            </tr>
            <?php
            // Incluir os dados do ANÚNCIO
            @$titulo = $_POST['titulo'];
            @$preco = $_POST['preco'];
            @$status = $_POST['status'];
            @$categoria = $_POST['categoria'];

            $query = "SELECT * FROM anuncios WHERE id > 0 ";
            $query .= ($titulo ? " AND titulo LIKE '%$titulo%' " : "");
            $query .= ($categoria ? " AND categoria LIKE '%$categoria%' " : "");
            $query .= ($preco ? " AND preco LIKE '%$preco%' " : "");
            $query .= ($status ? " AND status LIKE '%$status%' " : "");
            $query .= " ORDER by id";
            $result = mysqli_query($con, $query);

            while ($coluna = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $coluna['id']; ?></td>
                    <td><?php echo $coluna['titulo']; ?></td>
                    <td><?php echo $coluna['preco']; ?></td>
                    <td><?php echo $coluna['status']; ?></td>
                    <td><?php echo @$coluna['categoria']; ?></td>
                    <td style="text-align: center!important; align-items: center;">

                        <button type="button" name="botao" value="Excluir">
                            <img src="img\excluir.png" alt="Excluir um anúncio" style="max-width: 23px;">   
                        </button>

                        <a href="cadastrar_anuncio.php?pag=cadastrar_anuncio&id=<?php echo $coluna['id']; ?>">
                            <img src="img\editar.png" alt="Editar um anúncio" style="max-width: 23px;">
                        </a>
                    </td>

                </tr>
            <?php
            }
            ?>
        </table>
</body>

</html>