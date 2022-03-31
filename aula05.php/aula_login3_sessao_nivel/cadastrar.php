<html>
<body>
<?php
require('verifica.php');

// condição apenas para ver se é admin.
if ($_SESSION["UsuarioNivel"] != "AMD") echo "<script>alert('Você não é Administrador!');top.location.href='menu.php';</script>"; 

?>

<font size=7 color=red> Entrei no Cadastro - <?php echo $_SESSION["nome_usuario"]; ?></font>
</body>
</html>