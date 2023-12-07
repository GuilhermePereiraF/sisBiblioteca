<?php
class Emprestimo{
    private $leitor;
    private $retirada;
    private $prazoDevolucao;
    private $dataDevolucao;
    private $multa;
    private $livro;
    private $id;

public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}

public function getLeitor(){
    return $this->leitor;
}

public function setLeitor($leitor){
    $this->leitor = $leitor;
}


public function setRetirada($retirada){
    $this-> retirada = $retirada;
}
 
public function getPrazo_devolucao($prazo_devolucao){
     return $this-> getPrazo_Devolucao;
}
   
public function setPrazoDevolucao($prazoDevolucao){
     $this-> prazo = $prazoDevolucao;
}
public function getDataDevolucao(){
    return $this->data;
}

public function setDataDevolucao($dataDevolucao){
    $this->data = $dataDevolucao;
}


public function getMulta(){
    return $this->multa;
}

public function setMulta($multa){
    $this->multa = $multa;
}

public function getLivro(){
    return $this->livro;
}

public function setLivro($livro){
    $this->livro = $livro;
}



}