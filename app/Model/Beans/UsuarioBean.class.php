<?php

class UsuarioBean {

    private $id;
    private $nomeUsuario;
    private $nivelUsuario;
    private $emailUsuario;
    private $loginUsuario;
    private $senhaUsuario;

    function __construct($id = null, $nomeUsuario = null , $nivelUsuario = null, 
            $emailUsuario = null, $loginUsuario = null, $senhaUsuario = null) {
        $this->id = $id;
        $this->nomeUsuario = $nomeUsuario;
        $this->nivelUsuario = $nivelUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->loginUsuario = $loginUsuario;
        $this->senhaUsuario = $senhaUsuario;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
        return $this;
    }

    public function getNivelUsuario() {
        return $this->nivelUsuario;
    }

    public function setNivelUsuario($nivelUsuario) {
        $this->nivelUsuario = $nivelUsuario;
        return $this;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
        return $this;
    }

    public function getLoginUsuario() {
        return $this->loginUsuario;
    }

    public function setLoginUsuario($loginUsuario) {
        $this->loginUsuario = $loginUsuario;
        return $this;
    }

    public function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    public function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
        return $this;
    }	
}
?>