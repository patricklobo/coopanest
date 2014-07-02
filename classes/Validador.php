<?php

require_once 'Conexao.php';

class Validador {

    private $sql;
    private $conexao;
    
    public function alerta($texto){
        echo "<div id='msg'>".$texto."</div>";
    }

    public function validaEmail($email) {
        $conta = "^[a-zA-Z0-9\._-]+@";
        $domino = "[a-zA-Z0-9\._-]+.";
        $extensao = "([a-zA-Z]{2,4})$";

        $pattern = $conta . $domino . $extensao;

        if (ereg($pattern, $email))
            return true;
        else            Validador::alerta("Email inválido");
            
            

        return false;
    }

    public function validaEmailCad($email) {
        if (Validador::validaEmail($email)) {
            $this->conexao = new Conexao();
            $this->conexao->conectar();
            $this->sql = "SELECT email FROM usuario WHERE email = '$email'";
            $this->conexao->execSQL($this->sql);
            if ($this->conexao->contarDados() > 0) {
                Validador::alerta("Email já cadastrado <a href=#''>Recupere a senha");
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function validaSenha($senha1, $senha2) {
        if (strlen($senha1) < 8) {
            Validador::alerta("Senha deve conter no minimo 8 digitos");
            return false;
        } else {
            if ($senha1 != $senha2) {
                Validador::alerta("Senhas não conferem");
                return false;
            } else {

                return true;
            }
        }
    }
    
    public function validaSenhaBranco($senha) {
        if ($senha == "") {
            Validador::alerta("Senha não pode ser em branco");
            return false;
        } else {

                return true;
        }
    }

    public function validaNome($nome) {
        if (strlen($nome) < 4) {
            Validador::alerta("Seu nome deve conter no mínimo 4 letras");
            return false;
        } else {
            return true;
        }
    }
    
    public function dataBD($data){
         return implode("-",array_reverse(explode("/",$data)));
    }
    
    public function dataView($data){
         return implode("/",array_reverse(explode("-",$data)));
    }
    
    public function truncaHoraMin($data){
        return date("H:i", strtotime($data));
    }

}
