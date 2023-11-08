<?php
class Leitor{
    private $nome;
    private $nascimento;
    private $sexo;
    private $rg;
    private $id;
    private $cpf;

public function getCpf(){
    return $this->cpf;
}

public function setCpf($cpf){
    $this->cpf= $cpf;
}


public function getRg(){
    return $this->rg;
}

public function setRg($rg){
    $this->rg= $rg;
}

public function getNome(){
    return $this->nome;
}

public function setNome($nome){
    $this->nome = $nome;
}

public function getNascimento(){
    return $this->nascimento;
}

public function setNascimento($nascimento){
    $this-> nascimento = $nascimento;
}

public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}
 public function getSexo(){
    return $this->sexo;
}

public function setSexo($sexo){
    $this->sexo = $sexo;
}
}