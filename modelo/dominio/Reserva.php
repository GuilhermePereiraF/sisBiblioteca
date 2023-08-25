<?php
class Reserva{

    private $leitor;

    private $dataPrazo;

    private $situacao;

    private $usuario;

    private $livro;

    private $id;

    private $bibliotecario;

   

    public function setLeitor($leitor){

        $this->leitor = $leitor;

    }

    public function getLeitor(){

        return $this->$leitor;

    }

    public function setDataprazo($dataPrazo){

        $this->dataPrazo = $dataPrazo;

    }

    public function getDataprazo(){

        return $this->$dataPrazo;

    }

    public function setSituacao($situacao){

        $this->situacao = $situacao;

    }

    public function getSituacao(){

        return $this->$situacao;

    }

    public function setUsuario($usuario){

        $this->usuario = $usuario;

    }

    public function getUsuario(){

        return $this-> $usuario;

    }

    public function setLivro($livro){

        $this->livro = $livro;

    }

    public function getLivro(){

        return $this-> $livro;

    }

    public function setId($id){

        $this->id = $id;
}
}