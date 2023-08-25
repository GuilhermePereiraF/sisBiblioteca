<?php
class Editora{
    private $nome;
    private $telefone;
    private $area;
    private $tipoPublicacao;
    private $id;

public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}

public function getNome(){
    return $this->nome;
}

public function setNome($nome){
    $this->nome = $nome;
}
public function getTelefone($telefone){
    return $this->telefone;
}

public function setTelefone($telefone){
    $this-> telefone = $telefone;
}
 
public function getPublicacao($tipoPublicacao){
     return $this-> publicacao;
}
   
public function setPublicacao($tipoPublicacao){
     $this-> publicacao = $tipoPublicacao;
}
public function getArea(){
    return $this->area;
}

public function setArea($area){
    $this->area = $area;
}

}