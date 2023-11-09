<?php
class Bibliotecario{
    private $nome;
    private $telefone;
    private $email;
    private $matricula;
    
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

public function getTelefone($telefone){
    return $this->telefone;
}

public function setTelefone($telefone){
    $this-> telefone = $telefone;
}

public function getEmail($email){
    return $this->email;
}

public function setEmail($email){
    $this->email = $email;
}

 public function getMatricula($matricula){
    return $this->matricula;
}

public function setMatricula($matricula){
    $this->matricula = $matricula;
}



public function setCpf($cpf){
    $this->cpf = $cpf;
}
public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}
}