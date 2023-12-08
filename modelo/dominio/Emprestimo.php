<?php
class Emprestimo{
    private $leitor;
    private $retirada;
    private $prazo_Devolucao;
    private $data_Devolucao;
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
 
public function getPrazo_Devolucao($prazo_Devolucao){
     return $this-> getPrazo_Devolucao;
}
   
public function setPrazoDevolucao($prazo_Devolucao){
     $this-> prazo = $prazo_Devolucao;
}
public function getDataDevolucao(){
    return $this->data;
}

public function setDataDevolucao($data_Devolucao){
    $this->data = $data_Devolucao;
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