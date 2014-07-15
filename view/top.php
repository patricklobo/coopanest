<html>
    <head>
        <title><?=$this->titulo?></title>
        <script src="./js/jquery.js" type="text/javascript"></script>
        <script src="./js/validate.js" type="text/javascript"></script>
        <script src="./js/mask.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./view/visual.css" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="barra">
            <div class="barra-titulo"><?=$this->titulo?></div> <div class="usuario"><?=$_SESSION['usuarioNome']?></div>
            <?php
            $sessao = new Sessao();
            if($sessao->vetNivel()){
                include './view/menu.php'; 
            }
            ?> 
            <!--<img src="./view/img/logo.png">-->
        </div>
        <div class="geral">
            <?php require_once $this->conteudo?>
        </div>
    </body>
</html>

