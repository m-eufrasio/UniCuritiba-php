<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
        <?php
        
        include ('conexao.php');

        if (@$_REQUEST['botao'] == "Gravar") {

            $nome = $_POST['nome'];
            $idade = $_POST['idade'];

            $query = "INSERT INTO clientes (nome, idade) values ('$nome', '$idade')";
            $var = mysqli_query($con, $query);

            if (!$var) print mysqli_error($con);

        }

        if (@$_REQUEST['botao'] == "Apagar") {
            $codigo = $_POST['codigo'];

            $query = " DELETE FROM clientes WHERE id = '$codigo' ";
            $var = mysqli_query($con, $query);

            if (!$var) print mysqli_error($con);
        }

        ?>
        <form action=# method="POST">

        NOME: <input type="text" name="nome" required value="<?php print @$nome; ?>">
        IDADE: <input type="text" name="idade" required value="<?php print @$idade; ?>"> 
        <input type="submit" name="botao" value="Gravar">
        <hr>
        
        </form>

        <form action=# method="POST">
            Código: <input type="text" name="codigo" size=4 value="<?php print @$codigo; ?>">

            <input type="submit" name="botao" value="Apagar">
        </form>
    </body>
</html>