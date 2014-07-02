<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AtividadeBD
 *
 * @author patricklobo
 */

foreach (glob("*.php") as $filename)
{
    require_once $filename;
}

class AtividadeBD {
    
    private $conexao;
    private $atividade;
    private $usuarioBD;
    private $vetAtividade;
    private $sql = null;
    private $msg = null;

    function __construct() {
        $this->conexao = new Conexao();
        $this->conexao->conectar();
    }

    public function getAtividade() {
        $this->vetAtividade = array();
        $this->sql = "SELECT * FROM atividade ORDER BY id";
        $this->conexao->execSQL($this->sql);

        while ($row = $this->conexao->listarResultados()) {
            $this->atividade = new Atividade();
            $this->usuarioBD = new UsuarioBD();
            $this->atividade->setId($row['idatividade']);
            $this->atividade->setUsuario($this->usuarioBD->getUsuarioUni($row['usuario']));
            $this->atividade->setTitulo($row['titulo']);
            $this->atividade->setConteudo($row['conteudo']);
            $this->atividade->setDataIni($row['data_ini']);
            $this->atividade->setDataFim($row['data_fim']);

            array_push($this->vetAtividade, $this->atividade);
        }
        return $this->vetAtividade;
    }

    public function getAtividadeUni($id) {
        $this->sql = "SELECT * FROM atividade WHERE idatividade = '$id' ";
        $this->conexao->execSQL($this->sql);

        while ($row = $this->conexao->listarResultados()) {
            $this->atividade = new Atividade();
            $this->usuarioBD = new UsuarioBD();
            $this->atividade->setId($row['idatividade']);
            $this->atividade->setUsuario($this->usuarioBD->getUsuarioUni($row['usuario']));
            $this->atividade->setTitulo($row['titulo']);
            $this->atividade->setConteudo($row['conteudo']);
            $this->atividade->setDataIni($row['data_ini']);
            $this->atividade->setDataFim($row['data_fim']);
        }
        return $this->atividade;
    }

    public function setAtividade($operacao, $atividade) {
        $id = $atividade->getId();
        $usuario = $atividade->getUsuario();
        $titulo = $atividade->getTitulo();
        $conteudo = $atividade->getConteudo();
        $data_ini = $atividade->getDataIni();
        $data_fim = $atividade->getDataFim();
        switch ($operacao) {
            case 'I':
                $this->sql = "INSERT INTO `atividade`(`usuario`, `titulo`, `conteudo`,`data_ini`, `data_fim`) VALUES 
                                                     ('$usuario','$titulo' ,'$conteudo','$data_ini','$data_fim')";
                $this->conexao->execSQL($this->sql);

                break;
            case 'A':

                $this->sql = "UPDATE `atividade` SET `usuario`='$usuario',`titulo`='$titulo',`conteudo`='$conteudo' ,`data_atualizado`='' WHERE idatividade = '$id'";
                $this->conexao->execSQL($this->sql);
                break;
            case 'D':

                $this->sql = "DELETE FROM `atividade` WHERE idatividade = '$id'";
                $this->conexao->execSQL($this->sql);
                break;
            default:
                break;
        }
    }
}
