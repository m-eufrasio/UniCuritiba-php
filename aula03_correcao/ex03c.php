<html>
    <body>
        <?php 

        if (@$_REQUEST['botao'] == "Verificar") {
            $altura = $_POST['altura'];
            $sexo = $_POST['sexo'];

            if ($sexo == "M") print ( (72.7 * $altura) = 58);
            else if ($sexo == "F") print ( (62.1 * $altura) = 44.8); 
            else print "Escolha um sexo";

        ?>
        <form action="" method="POST"></form>

        Numero: <input type="text" name="numero" required value="<?php print @$var; ?>">
        <input type="submit" name="botao" value="Verificar">
    </body>
</html>