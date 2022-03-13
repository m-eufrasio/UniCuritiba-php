<html>
    <body>
        <table border="1">
        <?php 
            // print "Insira os dados solicitados: ";

            @$num = $_POST['v1'];

            while ($num <= 5) {
                print "<tr><td>" . $num. " ao quadrado: " . pow($num, 2) . "</td></tr>";
                $num++;
            }
        ?>
        </table>
        
        <!-- <form action=# method="POST">

            Valor 1: <input type="text" name="v1" size="3" required> </input>
            Valor 2: <input type="text" name="v2" size="3" required> </input>

            <input type="submit" name="botao" value="calcular"></input>

        </form> -->
    </body>
</html>