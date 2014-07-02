<?php

require_once 'Conexao.php';

class UsuarioBD {

    private $conexao;
    private $usuario;
    private $vetUsuario;
    private $sql = null;
    private $msg = null;

    function __construct() {
        $this->conexao = new Conexao();
        $this->conexao->conectar();
    }

    public function getUsuario() {
        $this->vetUsuario = array();
        $this->sql = "SELECT * FROM usuario ORDER BY nome";
        $this->conexao->execSQL($this->sql);

        while ($row = $this->conexao->listarResultados()) {
            $this->usuario = new Usuario();
            $this->usuario->setId($row['idusuario']);
            $this->usuario->setNome($row['nome']);
            $this->usuario->setEmail($row['email']);
            $this->usuario->setSenha($row['senha']);

            array_push($this->vetUsuario, $this->usuario);
        }
        return $this->vetUsuario;
    }

    public function getUsuarioUni($id) {
        $this->sql = "SELECT * FROM usuario WHERE idusuario = '$id' ";
        $this->conexao->execSQL($this->sql);

        while ($row = $this->conexao->listarResultados()) {
            $this->usuario = new Usuario();
            $this->usuario->setId($row['idusuario']);
            $this->usuario->setNome($row['nome']);
            $this->usuario->setEmail($row['email']);
            $this->usuario->setSenha($row['senha']);
        }
        return $this->usuario;
    }

    public function setUsuario($operacao, $usuario) {
        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        switch ($operacao) {
            case 'I':
                $this->sql = "INSERT INTO `usuario`(`nome`, `email`, `senha`) VALUES ('$nome','$email', sha1('$senha'))";
                $this->conexao->execSQL($this->sql);


                break;

            case 'A':

                $this->sql = "UPDATE `usuario` SET `nome`='$nome',`email`='$email',`senha`=sha1('$senha') WHERE idusuario = '$id'";
                $this->conexao->execSQL($this->sql);

                break;

            case 'D':

                $this->sql = "DELETE FROM `usuario` WHERE idusuario = '$id'";
                $this->conexao->execSQL($this->sql);

                break;

            default:
                break;
        }
    }

    public function autentica($usuario) {

        $email = $usuario->getEmail();
        $senha = sha1($usuario->getSenha());
        $this->sql = "SELECT email, senha, nome, nivel, idusuario FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $this->conexao->execSQL($this->sql);
        if ($this->conexao->contarDados() == 1) {
            if (!isset($_SESSION))
                session_start();
            $this->usuario = new Usuario();
            while ($row = $this->conexao->listarResultados()) {
                $this->usuario->setEmail($row['email']);
                $this->usuario->setNome($row['nome']);
                $this->usuario->setId($row['idusuario']);
                $_SESSION['usuarioNivel'] = $row['nivel'];
            }

            $this->usuario->setEmail($email);
            $this->usuario->setSenha($senha);
            
            $_SESSION['usuarioId'] = $this->usuario->getId();
            $_SESSION['usuarioNome'] = $this->usuario->getNome();
            $_SESSION['usuarioEmail'] = $this->usuario->getEmail();
            $_SESSION['usuarioSenha'] = $this->usuario->getSenha();
            return true;
        } else {
            return false;
        }
    }
    
    

}
