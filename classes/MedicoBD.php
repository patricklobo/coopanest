<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MedicoBD
 *
 * @author patricklobo
 */

foreach (glob("*.php") as $filename)
{
    require_once $filename;
}

class MedicoBD {
    
    private $conexao;
    private $medico;
    private $vetMedico;
    private $sql = null;
    private $msg = null;

    function __construct() {
        $this->conexao = new Conexao();
        $this->conexao->conectar();
    }

    public function getMedico() {
        $this->vetMedico = array();
        $this->sql = "SELECT * FROM Medicos ORDER BY nome";
        $this->conexao->execSQL($this->sql);

        while ($row = $this->conexao->listarResultados()) {
            $this->medico = new Medico();
            $this->medico->setCrm($row['CRM']);
            $this->medico->setNome($row['NOME']);
            $this->medico->setEmail($row['EMAIL']);
            $this->medico->setCpf($row['CPF']);

            array_push($this->vetMedico, $this->medico);
        }
        return $this->vetMedico;
    }

    public function getMedicoUni($crm) {
        $this->sql = "SELECT * FROM Medicos WHERE crm = '$crm' ";
        $this->conexao->execSQL($this->sql);

        while ($row = $this->conexao->listarResultados()) {
            $this->medico = new Medico();
            $this->medico->setCrm($row['CRM']);
            $this->medico->setNome($row['NOME']);
            $this->medico->setEmail($row['EMAIL']);
            $this->medico->setCpf($row['CPF']);
        }
        return $this->medico;
    }

    public function setMedico($operacao, $medico) {
        $crm = $medico->getCrm();
        $nome = $medico->getNome();
        $email = $medico->getEmail();
        $cpf = $medico->getCpf();
        switch ($operacao) {
            case 'I':
                $this->sql = "INSERT INTO `Medicos`(`NOME`, `EMAIL`, `CPF`, `CRM`) VALUES ('$nome','$email','$cpf','$crm')";
                $this->conexao->execSQL($this->sql);

                break;

            case 'A':

                $this->sql = "UPDATE `Medicos` SET `NOME`='$nome',`EMAIL`='$email',`CPF`='$cpf' WHERE crm = '$crm'";
                $this->conexao->execSQL($this->sql);

                break;

            case 'D':

                $this->sql = "DELETE FROM `Medicos` WHERE crm = '$crm'";
                $this->conexao->execSQL($this->sql);

                break;

            default:
                break;
        }
    }

}
