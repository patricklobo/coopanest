<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MedicoControle
 *
 * @author patricklobo
 */
foreach (glob("./classes/*.php") as $filename) {
    require_once $filename;
}

class MedicoControle {

    private $medico;
    private $medicoBD;
    private $validador;
    private $template;
    private $sessao;

    public function Cadastro() {
        $this->sessao = new Sessao();
        $this->sessao->verifica(1);

        $this->template = new Template();
        $this->template->setTitulo("Cadastro de Medico");
        $this->template->setConteudo("./view/MedicoCadastro.html");
        $this->template->view();
        if (!empty($_POST)) {
            $dados = $_POST;
            $this->medico = new Medico();
            $this->medico->setNome($dados['nome']);
            $this->medico->setEmail($dados['email']);
            $this->medico->setCpf($dados['cpf']);
            $this->medico->setCrm($dados['crm']);

            $this->validador = new Validador();

            $this->medicoBD = new MedicoBD();
            $this->medicoBD->setMedico('I', $this->medico);
            $this->validador->alerta("Casdastro efetuado com sucesso!");
        }
    }
    
    public function Deletar() {
        
        $this->sessao = new Sessao();
        $this->sessao->verifica(1);

        $this->template = new Template();
        $this->template->setTitulo("Deletamento de Medico");
        $this->template->setConteudo("./view/MedicoDeletar.php");
        $this->template->view();
        
        if (!empty($_POST)) {
            $dados = $_POST;
            $this->medico = new Medico();
            $this->medico->setCrm($dados['medico']);

            $this->validador = new Validador();

            $this->medicoBD = new MedicoBD();
            $this->medicoBD->setMedico('D', $this->medico);
            echo "<script>window.location.reload()</script>";
            $this->validador->alerta("Deletado efetuado com sucesso!");
        }
        
        
        
    }

}
