<!DOCTYPE html>
<html>

<head>
    <title> Categoria Cadastradas </title>
    <link rel="stylesheet" href="css/estiloRelatorio.css">
    <?php include('config.php'); 
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)) {
        $query_excluir = " DELETE FROM categoria WHERE id = '$id' ";
        $result_excluir = mysqli_query($con, $query_excluir);
        if (mysqli_affected_rows($con)) {
            print '<script> alert("Categoria excluído com sucesso!") </script>';
            print '<script type="text/JavaScript"> location.reload(); </script>';
        }
    }
    
    ?>

    
</head>

<body>
    <div class="nav">
        <label class="ola"> Olá <?php require('verifica.php');
        print $_SESSION["nome_usuario"]; ?> - Categoria Cadastradas</label>
        <button onclick="window.location.href = 'menu.php'" class="sair"> Voltar </button>
    </div>

    <div class="white-box">
        <div class="wb-center">

        
            <br><br>

            <div class="tabeladiv">
        
                <table class="tabela">
                    <tr>
                        <th> C&oacute;d. </th>
                        <th> Área </th>
                        <th> Editar </th>
                    </tr>
                    <?php
                    @$area = $_POST['area'];
            

                    $query = "SELECT *
                                    FROM categoria 
                                    WHERE id > 0 ";
                    $query .= ($area ? " AND login LIKE '%$area%' " : "");

                    $query .= " ORDER by id";
                    $result = mysqli_query($con, $query);

                    while ($coluna = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $coluna['id']; ?></td>
                            <td><?php echo $coluna['area']; ?></td>
                            <td style="text-align: center!important; align-items: center;">
                            </div>

                            <a href="gerenciar_categoria.php?pag=gerenciar_categoria&id=<?php echo $coluna['id']; ?>">
                                                        <img src="img\delete.png" alt="Excluir um anúncio" style="max-width: 23px;"> 
                                                    </a>
                            <!-- <button type="button" name="botao" value="Excluir">
                                <img src="img\excluir.png" alt="Excluir um anúncio" style="max-width: 23px;">   
                            </button> -->

                            <a href="cadastrar_categoria.php?pag=cadastrar_categoria&id=<?php echo $coluna['id']; ?>">
                                <img src="img\editar.png" alt="Editar um anúncio" style="max-width: 23px;">
                            </a>
                            </td>
                        </tr>
                    
                    <?php
                    } // fim while
                    ?>
                </table>

        </div>
    </div>
</body>

</html>