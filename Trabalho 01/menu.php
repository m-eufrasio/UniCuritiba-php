<!DOCTYPE html>
<html>

<head style="background-color: #000;">
    <link rel="stylesheet" href="css/estiloMenu.css">
    <title> Menu </title>
</head>

<div>
    <div>
        <label class="ola"> Olá <?php require('verifica.php'); echo $_SESSION["nome_usuario"]; ?></label>
    </div>
</div>

<body>
    <div class="menuOpcoes">
        <div class="painelMenu">
            <div class="menu">
                <?php if ($_SESSION["UsuarioNivel"] == "ADM") { ?>

                    <button onclick="window.location.href = 'cadastrar.php'" class="btnCadastrar"> Cadastrar </button>
                    
                <?php } ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <button onclick="window.location.href = 'relatorio.php'" class="btnRelatorio"> Relatório </button>

                <button onclick="window.location.href = 'cadastrar_anuncio.php'" class="btnRelatorio"> Anunciar </button>

                <button onclick="window.location.href = 'anuncios.php'" class="btnRelatorio"> Relatório de anúncios </button>
                <hr>
                <button onclick="window.location.href = 'logout.php'" class="sair"> Sair </button>
            </div>
        </div>
    </div>
</body>

</html>