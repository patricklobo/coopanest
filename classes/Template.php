<?php
require_once 'Sessao.php';

class Template {
    private $titulo;
    private $view;
    private $conteudo;
    private $acao;
    private $msg;
    
    public function getTitulo() {
        return $this->titulo;
    }

    public function getView() {
        return $this->view;
    }

    public function getConteudo() {
        return $this->conteudo;
    }

    public function getAcao() {
        return $this->acao;
    }

    public function getMsg() {
        return $this->msg;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function setView($view) {
        $this->view = $view;
        return $this;
    }

    public function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
        return $this;
    }

    public function setAcao($acao) {
        $this->acao = $acao;
        return $this;
    }

    public function setMsg($msg) {
        $this->msg = $msg;
        return $this;
    }

        public function view(){
        require_once './view/top.php';
    }


    
}
