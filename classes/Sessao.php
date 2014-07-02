<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sessao
 *
 * @author patricklobo
 */
class Sessao {
    
    
    public function verifica($nivel) {
        if (!isset($_SESSION)) session_start();
        $nivel_necessario = $nivel;
        if (!isset($_SESSION['usuarioId']) OR ( $_SESSION['usuarioNivel'] < $nivel_necessario)) {
            session_destroy();
            header("Location: ?controle=usuario&acao=login");
            exit;
        }
    }
    
    public function vetNivel(){
        if($_SESSION['usuarioNivel'] < 1)            return false;
        else            return true;
    }

}
