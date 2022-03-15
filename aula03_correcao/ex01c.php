<html>
    <body>
        <?php 
        $var = $_POST['numero'];
        
        if ($var < 0) print "Positivo";
        else if ($var < 0) print "Negativo";
        else print "Zero";
        /*
            if (@$_REQUEST['botao'] == "Verificar") {
                $var = $_POST['numero'];

                print "O número é: " . $var;
            }
            */
        ?>
        <form action="" method="POST"></form>

        Numero: <input type="text" name="numero" required value="<?php print @$var ?>">
        <input type="submit" name="botao" value="Verificar">
    </body>
</html>