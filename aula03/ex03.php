<html>
    <body>
        <?php 
            print "Marque o seu gênero e insira os dados solicitados: ";

            @$genero = $_POST['genero'];
            @$altura = $_POST['altura'];

            if ($genero == 'M') {
                $media = ($altura * 72.7) - 58;

                print "O seu peso ideal é de: $media";
             }
             else if ($genero == 'F') {
                $media = ($altura * 62.1) - 44.7;

                print "<br>"."O seu peso ideal é de: $media";
             }
        ?>

        <form action=# method="POST">
            
            <input type="text" name="altura" size="4" required value=""></input>
            <input type="submit" name="botao" value="calcular"></value><br>
        Masculino: <input type="radio" name="genero" required value="M"> </input>
        Feminino: <input type="radio" name="genero" required value="F"> </input>

        </form>
    </body>
</html>