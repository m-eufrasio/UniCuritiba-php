<html>
    <body>
        <table border=1>
        <?php
        if (@$_REQUEST['botao']=="mostrar") {
            $n1 = $_POST['n1'];
            $n2 = $_POST['n2'];

                while ($n1 <= $n2) {
                    print "<tr><td>". $n1 . "</td></tr>";
                    $n1++;
                }
            }
        ?>
        </table>

        <form action=# method="POST">
            Valor 1: <input type="text" name="n1" maxlength="2" size=3 required value="<?php @$n1; ?>">
            Valor 2: <input type="text" name="n2" maxlength="2" size=3 required value="<?php @$n2; ?>">
            <br>
            <input type="submit" name="botao" value="mostrar">
        </form>
    </body>
</html>