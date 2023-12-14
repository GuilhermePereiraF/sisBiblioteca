<?php
class Reserva{

    private $leitor;

    private $dataprazo;

    private $situacao;

    private $usuario;

    private $Livro_id;

    private $id;

    private $bibliotecario;

   

    public function setLeitor($leitor){

        $this->leitor = $leitor;

    }

    public function getLeitor(){

        return $this->$leitor;

    }

    public function setDataprazo($dataprazo){

        $this->dataprazo = $dataprazo;

    }

    public function getDataprazo(){

        return $this->$dataprazo;

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

    public function setLivro_id($Livro_id){

        $this->Livro_id = $Livro_id;

    }

    public function getLivro_id(){

        return $this-> $Livro_id;

    }

    public function setId($id){

        $this->id = $id;
}
}