<!DOCTYPE html>
<html>

<head>
    <title> Anúncios </title>
    <link rel="stylesheet" href="css/estiloRelatorio.css">
    

    <?php
    include('config.php');
 
    ?>
</head>

<body>

<div class="nav">

    <?php  { ?>

        <label class="ola"> Anúncios </label>
        <button onclick="window.location.href = 'user_cadastro.php'" class="sair"> Cadastrar </button>
        <button onclick="window.location.href = 'login.php'" class="sair"> Login </button>
                                

    <?php }  ?>
    
</div>

<div class="white-box">
    <div class="wb-center">

        <div class="camposBuscaanun">
            <form action="home.php?botao=gravar" method="POST" name="form1">

                <div class="campos">
        

                    <label for="" width="18%"> Titulo: </label>
                    <input class="campdadosBusca" type="text" name="titulo">

                    <label for="" width="18%"> Preço: </label>
                    <input class="campdadosBusca" type="text" name="preco">

                    <label for="" width="18%"> Situação: </label>
                    <input class="campdadosBusca" type="text" name="status">

                    <label for="" width="30%"> Categoria: </label>
                    <select name="buscar_categoria" id="buscar_categoria">
                        
                        <option>  </option>
                        <?php
                            @$query = " SELECT * FROM categoria ";

                            $result = mysqli_query($con, $query);

                            while($row = mysqli_fetch_assoc(@$result)) { ?>
                                <option value="<?php print @$row['id']; ?>"> <?php print $row['area']; ?> </option> <?php     
                            }
                        ?>

                    </select>
                    <button type="submit" name="botao" value="Gerar" class="btnGerar"> Buscar </button>

                </div>

            </form>
        </div>


        <?php if (@$_REQUEST['botao'] == "Gerar") { ?>
            <div class="tabeladiv">
                <table class="tabela">

                    <tr>
                            <th> C&oacute;d </th>
                            <th> Título </th>
                            <th> Preço </th>
                            <th> Status </th>
                    
                        </tr>

                        <?php


                    $titulo = $_POST['titulo'];
                    $preco = $_POST['preco'];
                    $categoria_id = $_POST['buscar_categoria'];
                    $nome_status = [10 => 'Reprovado', 5 => 'Aprovado'];
                    $query = "SELECT *
                    FROM anuncios 
                    WHERE  status > 0 ";

                    $query .= ($titulo ? " AND titulo LIKE '%$titulo%' " : "");
                    $query .= ($preco ? " AND preco = '$preco' " : "");
                    $query .= ($categoria_id ? " AND categoria_id = '$categoria_id' " : "");
                    $result = mysqli_query($con, $query, );



                    while ($coluna = mysqli_fetch_array($result)) {
                    ?>
                    
                        <tr>
                            <td><?php echo $coluna['id_anuncio']; ?></td>
                            <td><?php echo $coluna['titulo']; ?></td>
                            <td><?php echo $coluna['preco']; ?></td>
                            <td><?php echo @$nome_status[$coluna['status']]; ?></td>
                            </td>
                        </tr>

                    <?php
                        } // fim while

                    ?>

                </table>
            </div>
        <?php	
        }
        ?>             
    </div>
</div>
  
</body>

</html>