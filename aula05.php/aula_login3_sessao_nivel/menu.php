<html>
<body>
<br><br><br><br><br><br><br><br><br><br>
<font size=7 color=red> Entrei <?php require('verifica.php'); echo $_SESSION["nome_usuario"]; ?></font>
<br><br><br> 
<?php if ($_SESSION["UsuarioNivel"] == 'AMD') { ?>
    <a href="cadastrar.php">cadastrar</a> 
<?php } ?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="relatorio.php">relatório</a>

<br><br><br> 
<a href="logout.php"> sair </a>
</table>