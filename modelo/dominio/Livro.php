<?php
class Livro{
    private $titulo;
    private $autor;
    private $editora;
    private $id;


public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}

public function getTitulo(){
    return $this->titulo;
}

public function setTitulo($titulo){
    $this->titulo = $titulo;
}
public function getEditora(){
    return $this->editora;
}

public function setEditora($editora){
    $this->editora = $editora;
}

public function getAutor(){
    return $this->autor;
}

public function setAutor($autor){
    $this->autor = $autor;
}

}