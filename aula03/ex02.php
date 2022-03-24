<html>
    <body>
        <?php 
            print "Digite as notas do aluno: <br>";

            @$nota1 = $_POST['nota1'];
            @$nota2 = $_POST['nota2'];
            @$media = ($nota1 + $nota2) / 2;

            print "Média geral: $media <br>";

            if ($media > 60) {
                print "Aluno aprovado";
            }
            else if ($media < 30) {
                print "Aluno reprovado";
            }
            else if ($media > 30 && $media < 60) {
                print "Será necessário realizar o exame final";
            }
        ?>

        <form action=# method="POST">

            Nota1<input type="text" name="nota1" maxlength="3" size="3" required value="<?php print $nota1 ?>"></input> <br>
            Nota2<input type="text" name="nota2" maxlength="3" size="3" required value="<?php print $nota2 ?>"></input> <br>

            <input type="submit" name="botao" value="calcular">

        </form>
    </body>
</html>