<html>
    <body>
        <?php 
        print "Verifique se o número é negativo, positivo ou zero <br>"; 
        
        $num = $_POST['valor'];

            if ($num < 0) {
                print "O valor $num é negativo";
            }
            else if ($num > 0) {
                print "O valor $num é positivo";
            }
            else if ($num == 0) {
                print "O valor inserido é igual a 0";
            }
        ?>
        
        <form action=# method="POST">
        Valor: <input type="text" name="valor" required value="<?php print $num ?>"></input>

        <input type="submit" name="botao" value="verificar">
        </form>
    </body>    
</html>