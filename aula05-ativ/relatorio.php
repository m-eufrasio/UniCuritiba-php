<!DOCTYPE html>
<html>

<head>
    <title>Relatorio</title>
    <link rel="stylesheet" href="css/estiloRelatorio.css">
    <?php include('config.php');  ?>
</head>

<body>
    <div class="cabecalho">
        <div>
            <label class="ola"><?php require('verifica.php');
                                echo $_SESSION["nome_usuario"]; ?> - Relatorio de usuarios</label>
            <button onclick="window.location.href = 'menu.php'" class="sair">Menu</button>
            <button onclick="window.location.href = 'logout.php'" class="sair">Sair</button>
        </div>
    </div>

    <div class="camposBusca">
        <form action="relatorio.php?botao=gravar" method="POST" name="form1">
            <div class="campos">
                <label for="" width="18%">Código: </label>
                <input class="campdadosBusca" type="text" name="id">
                <label for="" width="18%">Nome: </label>
                <input class="campdadosBusca" type="text" name="login">
                <button type="submit" name="botao" value="Gerar" class="btnGerar">Buscar</button>
            </div>
        </form>
    </div>
    <br><br>

    <div class="camposBusca">
        <table class="tabela">
            <tr>
                <th>C&oacute;d</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Nivel</th>
                <th>Editar</th>
            </tr>
            <?php
            @$login = $_POST['login'];
            @$senha = $_POST['senha'];
            @$nivel = $_POST['nivel'];

            $query = "SELECT *
                            FROM usuario 
                            WHERE id > 0 ";
            $query .= ($login ? " AND login LIKE '%$login%' " : "");
            $query .= ($senha ? " AND senha LIKE '%$senha%' " : "");
            $query .= ($nivel ? " AND nivel LIKE '%$nivel%' " : "");
            $query .= " ORDER by id";
            $result = mysqli_query($con, $query);

            while ($coluna = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $coluna['id']; ?></td>
                    <td><?php echo $coluna['login']; ?></td>
                    <td><?php echo $coluna['senha']; ?></td>
                    <td><?php echo $coluna['nivel']; ?></td>
                    <td style="text-align: center!important; align-items: center;">
                        <a href="cadastrar.php?pag=cadastrar&id=<?php echo $coluna['id']; ?>">
                            <img src="editar.png" alt="" style="max-width: 17px;">
                        </a>
                    </td>

                </tr>
            <?php
            } // fim while
            ?>
        </table>
</body>

</html>