<html>
<body>
<br><br><br><br><br><br><br><br><br><br>
<!-- vai verificar se a pessoa está logada, ele vem para o verifica para ver se tem sessão. -->
<font size=7 color=red> Entrei <?php require('verifica.php'); echo $_SESSION["nome_usuario"]; ?></font>
<br><br><br> <a href="logout.php"> sair </a>
</table>