<!DOCTYPE html>
<html>

<head>
    <title> Meus Anuncios </title>
    <link rel="stylesheet" href="css/estiloRelatorio.css">


    <?php

        include('config.php');
        $verificar = require('verifica.php');
        $id_usuario = @$_SESSION['id_usuario'];


        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($id)) {
            $query_excluir = " DELETE FROM anuncios WHERE id_anuncio = '$id' ";
            $result_excluir = mysqli_query($con, $query_excluir);
            if (mysqli_affected_rows($con)) {
                print '<script> alert("Anúncio excluído com sucesso!") </script>';
                print '<script type="text/JavaScript"> location.reload(); </script>';
            }
        }
    ?>
</head>

<div class="nav">
    <?php if ( $verificar)  { ?>

    <label class="ola"> Olá <?php 
    print $_SESSION["nome_usuario"];  ?> - Seus Anuncios </label>
    <button onclick="window.location.href = 'Menu.php'" class="sair"> Menu </button>
    <?php }  ?>
</div>

<body>
<div class="white-box">
    <div class="wb-center">
    
        <div class="camposBuscaanun">
            <form action="meus_anuncios.php?botao=gravar" method="POST" name="form1">

                <div class="campos">
                    <label for="" width="18%"> Código: </label>
                    <input class="campdadosBusca" type="text" name="id">

                    <label for="" width="18%"> Titulo: </label>
                    <input class="campdadosBusca" type="text" name="titulo">

                    <label for="" width="18%"> Preço: </label>
                    <input class="campdadosBusca" type="text" name="preco">

                    <label for="" width="30%"> Categoria: </label>
                    <select name="categoria" id="categoria">

                        <option> Selecione </option>
                        <?php
                        @$query = " SELECT * FROM categoria ";

                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc(@$result)) { ?>
                            <option value="<?php print @$row['id']; ?>"> <?php print $row['area']; ?> </option> <?php
                                                                                                            }
                                                                                                                ?>

                    </select>

                    <label for="" width="18%"> Situação: </label>
                    <input class="campdadosBusca" type="text" name="status">

                    <button type="submit" name="botao" value="Gerar" class="btnGerar"> Buscar </button>

                </div>

            </form>
        </div>

        <?php if (@$_REQUEST['botao'] == "Gerar") { ?>
        <div class="tabeladiv">
        <table class="tabela">

                <tr>
                    <th> C&oacute;d </th>
                    <th> Título </th>
                    <th> Preço </th>
                    <th> Status </th>
                    <th> Editar </th>
                </tr>

                <?php


            $titulo = $_POST['titulo'];
            $preco = $_POST['preco'];
            $nome_status = [10 => 'Reprovado', 5 => 'Aprovado'];
            $query = "SELECT *
            FROM anuncios 
            WHERE  status >= 0 AND id_usuario = $id_usuario";
            $query .= ($titulo ? " AND titulo LIKE '%$titulo%' " : "");
            $query .= ($preco ? " AND preco = '$preco' " : "");
            $result = mysqli_query($con, $query);



            while ($coluna = mysqli_fetch_array($result)) {
            ?>

            
                            <tr>
                                <td><?php print $coluna['id_anuncio']; ?></td>
                                <td><?php print $coluna['titulo']; ?></td>
                                <td><?php print $coluna['preco']; ?></td>
                                <td><?php print @$nome_status[$coluna['status']]; ?></td>
                                </td>
                                <td style="text-align: center!important; align-items: center;">

                                    <a href="meus_anuncios.php?pag=meus_anuncios&id=<?php echo $coluna['id_anuncio']; ?>">
                                        <img src="img\delete.png" alt="Excluir um anúncio" style="max-width: 23px;">
                                    </a>
                                    <a href="cadastrar_anuncio.php?pag=cadastrar_anuncio&id=<?php echo $coluna['id_anuncio']; ?>">
                                        <img src="img\editar.png" alt="Editar um anúncio" style="max-width: 23px;">
                                    </a>
                                </td>
                            </tr>

            <?php
            
            } // fim while
            ?>
        </table>
        <?php	
        }
        ?>
    </div>
</div>
</body>

</html>



