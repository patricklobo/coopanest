<?php

foreach (glob("./classes/*.php") as $filename)
{
    require_once $filename;
}


    class AtividadeControle {
        private $validador;
        private $template;
        private $atividade;
        private $atividadeBD;
        private $sessao;


        public function __construct() {
            $this->sessao = new Sessao();
            $this->sessao->verifica(1);
            }


        public function index() {
            
            $this->template = new Template();
            $this->template->setTitulo("Calendário");
            $this->template->setConteudo("./view/AtividadeIndex.php");
            $this->template->view();
        }
        
        public function select(){
            $this->template = new Template();
            $this->template->setTitulo("Eventos");
            $this->template->setConteudo("./view/AtividadeSelect.php");
            $this->template->view();
            
            if (!empty($_POST)) {
            $dados = $_POST;
            $this->atividade = new Atividade();
            $this->atividade->setTitulo($dados['titulo']);
            $this->atividade->setDataIni($dados['data'] . " " . $dados['hini'] . ":" . $dados['mini'] . ":" . "00");
            $this->atividade->setDataFim($dados['data'] . " " . $dados['hfim'] . ":" . $dados['mfim'] . ":" . "00");
            $this->atividade->setUsuario($_SESSION['usuarioId']);
            $this->atividade->setConteudo($dados['conteudo']);

                $this->validador = new Validador();
                $this->atividadeBD = new AtividadeBD();
                $this->atividadeBD->setAtividade('I', $this->atividade);
                echo "<script>window.location.reload()</script>";
                $this->validador->alerta("Casdastro efetuado com sucesso!");
        }
            
        }
        
        public function deletaEvento(){
            
        }
        
        
        
    }

