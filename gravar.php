<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
        <?php
        
        include ('conexao.php');

        if (@$_REQUEST['botao'] == "Gravar") {

            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $idade = $_POST['idade'];
            $altura = $_POST['altura'];


            $query = "INSERT INTO clientes (nome, sobrenome, idade, altura) values ('$nome', '$sobrenome', '$idade', '$altura')";
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
        <h3>UNICURITIBA</h3>
        <hr>
        <div class="box">
            <div class="box2">
                <form action=# method="POST">

                Nome: <input type="text" name="nome" required value="<?php print @$nome; ?>">
                Sobrenome: <input type="text" name="sobrenome" requried value="<?php @$sobrenome; ?>">
                Idade: <input type="text" name="idade" required value="<?php print @$idade; ?>"> 
                Altura: <input type="text" name="altura" required value="<?php print @$altura; ?>">
                <input type="submit" name="botao" id="botao" value="Gravar">
                
                </form>

                <form action=# method="POST">
                    Código: <input type="text" name="codigo" size=4 value="<?php print @$codigo; ?>">

                    <input type="submit" name="botao" id="botao" value="Apagar">
                </form>
            </div>
        </div>
    </body>
</html>