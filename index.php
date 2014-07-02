<?php

require_once './classes/Sessao.php';

$controle = $_GET['controle']."Controle";
$acao = $_GET['acao'];

if($controle == "Controle" && $acao == ""){
            $sessao = new Sessao();
            if($sessao -> vetNivel()){
                header("Location: ?controle=Atividade&acao=index");
            } else {
                header("Location: ?controle=Usuario&acao=login");
            }
    
} else {

require_once 'controle/'.$controle.'.php';

$obj = new $controle();
if($acao != ""){
    $obj->$acao();
} else {
    $obj->index();
}
 } 








