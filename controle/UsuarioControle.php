<?php

foreach (glob("./classes/*.php") as $filename)
{
    require_once $filename;
}

class UsuarioControle {

    private $usuario;
    private $usuarioBD;
    private $validador;
    private $template;
    private $sessao;
            
    function __construct() {
            
    }

    public function index() {
        
    }

    public function Cadastro() {
        $this->sessao = new Sessao();
            $this->sessao->verifica(1);
        $this->template = new Template();
        $this->template->setTitulo("Cadastre-se!");
        $this->template->setConteudo("./view/UsuarioCadastro.html");
        $this->template->view();
        if (!empty($_POST)) {
            $dados = $_POST;
            $this->usuario = new Usuario();
            $this->usuario->setNome($dados['nome']);
            $this->usuario->setEmail($dados['email']);
            $this->usuario->setSenha($dados['senha1']);

            $this->validador = new Validador();

            if ($this->validador->validaNome($dados['nome']) &&
                    $this->validador->validaEmailCad($dados['email']) &&
                    $this->validador->validaSenha($dados['senha1'], $dados['senha2'])) {
                $this->usuarioBD = new UsuarioBD();
                $this->usuarioBD->setUsuario('I', $this->usuario);
                $this->validador->alerta("Casdastro efetuado com sucesso!<br>Clique em SAIR para entrar com o novo usuário");
            }
        }
    }

    public function Login() {
        $this->template = new Template();
        $this->template->setTitulo("Entre!");
        $this->template->setConteudo("./view/UsuarioLogin.html");
        $this->template->view();

        if (!empty($_POST)) {
            $dados = $_POST;
            $this->usuario = new Usuario();
            $this->usuario->setEmail($dados['email']);
            $this->usuario->setSenha($dados['senha']);

            $this->validador = new Validador();

            if ($this->validador->validaEmail($dados['email']) &&
                    $this->validador->validaSenhaBranco($dados['senha'])) {
                $this->usuarioBD = new UsuarioBD();
                if($this->usuarioBD->autentica($this->usuario)){
                    header('location: ?controle=atividade&acao=index');
                } else {
                    $this->validador->alerta("Usuário ou senha incorreto!");
                }
            }
        }
    }
    
    public function logoff(){
            $this->sessao = new Sessao();
            $this->sessao->verifica(50);
    }

}
