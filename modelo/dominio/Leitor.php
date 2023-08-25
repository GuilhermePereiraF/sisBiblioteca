<?php
class Leitor{
    private $nome;
    private $nascimento;
    private $sexo;
    private $rg;
    private $id;

public function getRg($rg){
    return $this->rg;
}

public function setRg($rg){
    $this->rg= $rg;
}

public function getNome($nome){
    return $this->nome;
}

public function setNome($nome){
    $this->nome = $nome;
}

public function getNascimrnto($nascimento){
    return $this->nascimento;
}

public function setNascimento($Nascimento){
    $this-> nascimento = $nascimento;
}

public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}
 public function getSexo($sexo){
    return $this->sexo;
}

public function setSexo($sexo){
    $this->sexo = $sexo;
}
}