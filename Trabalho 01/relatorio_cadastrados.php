<!DOCTYPE html>
<html>

<head>
    <title>Relatorio</title>
    <link rel="stylesheet" href="css/estiloRelatorio.css">
    <?php include('config.php'); 
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)) {
        $query_excluir = " DELETE FROM usuario WHERE id_usuario = '$id' ";
        $result_excluir = mysqli_query($con, $query_excluir);
        if (mysqli_affected_rows($con)) {
            print '<script> alert("Usuario excluído com sucesso!") </script>';
            print '<script type="text/JavaScript"> location.reload(); </script>';
        }
    }
    
    ?>

    
</head>

<body>
    <div class="nav">
        <label class="ola"> Olá <?php require('verifica.php');
        print $_SESSION["nome_usuario"]; ?> - Relatorio de usuarios </label>
        <button onclick="window.location.href = 'menu.php'" class="sair"> Voltar </button>
    </div>

<div class="white-box">
    <div class="wb-center">

            <div class="camposBusca">
                <form action="relatorio_cadastrados.php?botao=gravar" method="POST" name="form1">
                    <div class="campos">
                 
                        <label for="" width="5%"> Nome: </label>
                        <input class="campdadosBusca" type="text" name="login">
                        <label for="" width="5%"> Nivel: </label>
                        <input class="campdadosBusca" type="text" name="nivel">
                        <button type="submit" name="botao" value="Gerar" class="btnGerar"> Buscar </button>
                    </div>
                </form>
            </div>
            <br><br>

            <div class="tabeladiv">
        
                <table class="tabela">
                    <tr>
                        <th> C&oacute;d. </th>
                        <th> Login </th>
                        <th> Senha </th>
                        <th> Nível </th>
                        <th> Editar </th>
                    </tr>
                    <?php
                    @$id_usuario = $_POST['id_usuario'];
                    @$login = $_POST['login'];
                    @$senha = $_POST['senha'];
                    @$nivel = $_POST['nivel'];

                    $query = "SELECT *
                                    FROM usuario 
                                    WHERE id_usuario > 0 ";
                  $query .= ($id_usuario ? " AND id_usuario LIKE '%$$id_usuario%' " : "");
                    $query .= ($login ? " AND login LIKE '%$login%' " : "");
                    $query .= ($senha ? " AND senha LIKE '%$senha%' " : "");
                    $query .= ($nivel ? " AND nivel LIKE '%$nivel%' " : "");
                    $query .= " ORDER by id_usuario";
                    $result = mysqli_query($con, $query);

                    while ($coluna = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $coluna['id_usuario']; ?></td>
                            <td><?php echo $coluna['login']; ?></td>
                            <td><?php echo $coluna['senha']; ?></td>
                            <td><?php echo $coluna['nivel']; ?></td>
                            <td style="text-align: center!important; align-items: center;">
                            </div>

                            <a href="relatorio_cadastrados.php?pag=relatorio_cadastrados&id_usuario=<?php echo $coluna['id_usuario']; ?>">
                                                        <img src="img\delete.png" alt="Excluir um anúncio" style="max-width: 23px;"> 
                                                    </a>

                            <a href="cadastrar.php?pag=cadastrar&id_usuario=<?php echo $coluna['id_usuario']; ?>">
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