<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title> Relat&oacute;rio de Anúncios </title>
    <?php include('config.php');  ?>
    <link rel="stylesheet" href="css/estiloRelatorio.css">
</head>

<body>
    <?php require('verifica.php'); ?>

    <div class="cabecalho">
        <div>
            <button onclick="window.location.href = 'menu.php'" class="sair"> Menu </button>
        </div>
    </div>
    <br><br>

    <?php
    $botao_status = ['Reprovar' => 10, 'Aprovar' => 5];

    if (@$_REQUEST['botao'] == "Reprovar" || @$_REQUEST['botao'] == "Aprovar") {
        
        $status = $botao_status[$_REQUEST['botao']];

        $insere = "UPDATE anuncios SET status = '$status' WHERE id_anuncio = '{$_REQUEST['id_anuncio']}' AND id_usuario = '{$_REQUEST['id_usuario']}' ";
        $result_update = mysqli_query($con, $insere);

        if ($result_update) print '<script> alert("Status atribuido com sucesso!") </script>';
        else print '<script> alert("Não foi possível atualizar!") </script>';
    }
    ?>
    <div class="camposBusca-libera">
        <div class = "campoliberar">
        <label for="" class="label-liberar-anuncios"> Anuncios para aprovação </label>
         </div>
        
      
       
        <br><br>
        <table class="tabela">
            
            <tr>
                <th> Título </th>
                <th> Preço </th>
                <th> Status </th>
            </tr>

            <?php

            @$titulo = $_POST['titulo'];
            @$preco = $_POST['preco'];

            $query = " SELECT * FROM anuncios WHERE status = 0 ";

            $query .= " ORDER by id_anuncio";
            $result = mysqli_query($con, $query);

            while ($coluna = mysqli_fetch_array($result)) {
            ?>

                <tr>
                
                    <td><?php echo $coluna['titulo']; ?></td>
                    <td>R$<?php echo $coluna['preco']; ?></td>
                    <td style="text-align: center;">
                        <form action="">
                            <input type="hidden" value="<?= $coluna['id_anuncio'] ?>" name="id_anuncio">
                            <input type="hidden" value="<?= $coluna['id_usuario'] ?>" name="id_usuario">

                            <input type="submit" value="Reprovar" class="btn-reprova-anuncio" name="botao">
                            <input type="submit" value="Aprovar" class="btn-libera-anuncio" name="botao">
                        </form>
                    </td>
                </tr>

            <?php
            } // fim while
            ?>
        </table>
    </div>
</body>

</html>