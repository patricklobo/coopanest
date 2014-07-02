<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Atividade
 *
 * @author patricklobo
 */
class Atividade {
    
    private $id;
    private $usuario;
    private $titulo;
    private $conteudo;
    private $dataIni;
    private $dataFim;
    
    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getConteudo() {
        return $this->conteudo;
    }

    public function getDataIni() {
        return $this->dataIni;
    }
    
    public function getDataFim() {
        return $this->dataFim;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
        return $this;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
        return $this;
    }

    public function setDataIni($dataIni) {
        $this->dataIni = $dataIni;
        return $this;
    }
    
    public function setDataFim($dataFim) {
        $this->dataFim = $dataFim;
        return $this;
    }


}
