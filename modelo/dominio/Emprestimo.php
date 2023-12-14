<?php
class Emprestimo{
    private $leitor;
    private $retirada;
    private $Prazo_Devolucao;
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
 

public function getprazo_devolucao($prazo_devolucao){
     return $this-> prazo = $prazo_devolucao;
}
   
public function setprazo_devolucao($prazo_devolucao){
     $this-> prazo = $prazo_devolucao;
}
public function getdata_devolucao($data_devolucao){
    return $this->data = $data_devolucao;
}

public function setdata_devolucao($data_devolucao){
    $this->data = $data_devolucao;
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