<html>
    <body>
        <?php 

        if ($var = $REQUEST['botao'] == "Verificar") {
            @$media = $_POST['media'];

            if ($media > 6) print "Passou";
            else if ($var < 3) print "Reprovado";
            else print "Exame";

            if ($media > 6) print "Passou";
            else if ($media >= 3 && $media < 6) print "Exame";
            else print "Reprovado";
        }

        ?>
        <form action="" method="POST"></form>

        Altura: <input type="text" name="altura" required value="<?php print $altura ?>">
        Sexo: <input type="radio" name="sexo" required value="F"> Feminino
        <input type="radio" name="sexo" required value="M"> Masculino
        <input type="submit" name="botao" value="Verificar">
    </body>
</html>