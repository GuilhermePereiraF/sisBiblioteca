<?php
class Autor{
    private $nome;
    private $obras;
    private $id;

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setObras($obras){
        $this->obras = $obras; 
    }

    public function getObras(){
        return $this->obras;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
}