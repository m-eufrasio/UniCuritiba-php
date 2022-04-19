<!DOCTYPE html>
<html>

<head style="background-color: #000;">
    <link rel="stylesheet" href="css/estiloMenu.css">
    <title> Menu </title>
</head>



<body>
<div>
    <div>
        <label class="ola"> Olá <?php require('verifica.php'); echo $_SESSION["nome_usuario"]; ?>, o que gostaria ?</label>
    </div>
</div>
    <div class="menuOpcoes">
        <div class="painelMenu">
            <div class="menu">
        
                <?php if ($_SESSION["UsuarioNivel"] == "ADM") { ?>

                    <button onclick="window.location.href = 'cadastrar.php'" class="btnCadastrar"> Cadastrar </button>
                    <button onclick="window.location.href = 'relatorio_cadastrados.php'" class="btnRelatorio"> Cadastros </button>
                    <br><br>
                    <button onclick="window.location.href = 'cadastrar_categoria.php'" class="btnCadastrar"> Cadastrar Categoria </button>
                    <button onclick="window.location.href = 'gerenciar_categoria.php'" class="btnCadastrar"> Gerenciar Categoria </button>
                    <br><br>
                    <button onclick="window.location.href = 'liberar_anuncios.php'" class="btnCadastrar"> Liberar Anúncios </button>
                    
                <?php } ?>  

               
                <br> <br>
                <button onclick="window.location.href = 'cadastrar_anuncio.php'" class="btnRelatorio"> Anunciar </button>

                <button onclick="window.location.href = 'anuncios.php'" class="btnRelatorio"> Ver Anúncios </button>

                <button onclick="window.location.href = 'meus_anuncios.php'" class="btnRelatorio"> Meus Anúncios </button>
            
                <button onclick="window.location.href = 'logout.php'" class="sair"> Sair </button>
            </div>
            
        </div>
    </div>
</body>

</html>