<html>
    <body>
        <?php
        print "Olá <br>";

        if (@$_REQUEST['botao']=="calcular") {

            $num1 = $_POST['v1'];
            $num2 = $_POST['v2'];
            $tipo = $_POST['tipo'];
            @$mostrar = $_POST['mostrar'];

            if ($tipo == "S") $resultado = $num1 + $num2;
            else if ($tipo == "D") $resultado = $num1 - $num2;

            if ($mostrar == "S") print "O resultado é: " . $resultado;
            else print $resultado;
            // print "O resultado é: " . $resultado . "<br> texto";
        }
        ?>

        <!-- é inserido dentro de value as tags php com o print dos numeros para poder aparecer na caixa os valores digitados, sem sumirem; -->
        <form action="aula022.php" method="POST">
            Valor1: <input type="text" name="v1" required value="<?php print @$num1;?>"> <br>
            Valor2: <input type="text" name="v2" required value="<?php print @$num2;?>"> <br>
            <input type="radio" name="tipo" required value="S"> Somar
            <input type="radio" name="tipo" required value="D"> Subtrair
            <br>
            <input type="checkbox" name="mostrar" value="S" cheked> Mostrar texto no resultado
            <input type="submit" name="botao" value="calcular">
        </form>

    </body>
</html>