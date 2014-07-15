<?php

/*
 Esse classe é referencia...
 */

/**
 * Description of Medico
 *
 * @author patricklobo
 */
class Medico {
   
    private $crm;
    private $nome;
    private $cpf;
    private $email;
    
    
    public function getCrm() {
        return $this->crm;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setCrm($crm) {
        $this->crm = $crm;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getAjax(){
        return "|".$this->crm."|".$this->nome."|".$this->email."|".$this->cpf."|";
    }
    


    
}
