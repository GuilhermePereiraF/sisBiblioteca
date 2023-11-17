<?php

require_once 'modelo/dominio/Livro.php';
require_once 'modelo/dao/LivroDao.php';

$livroDao = new LivroDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formLivro.php';
} else if ($acao == "salvar") {
    $livro = new Livro();
    $livro->setId($_POST['id']);
    $livro->setAutor($_POST['autor']);
    $livro->setTitulo($_POST['titulo']);
    $livro->setEditora($_POST['editora']);
    $livro->setArea($_POST['area']);

    $livroDao->salvar($livro);

 header("Location: ?page=livroControle&acao=listar");
} else if ($acao == "listar") {
    $livro = $livroDao->listar();
    include 'pages/listarLivro.php';
} else if ($acao == "alterar") {
   
    $livro = new Livro();
    $livro->setId($_POST['id']);
    $livro->setAutor($_POST['autor']);
    $livro->setTitulo($_POST['titulo']);
    $livro->setEditora($_POST['editora']);
    $livro->setArea($_POST['area']);
    $livroDao->atualizar($aluno);

    header("Location: ?page=livroControle&acao=listar");
    
} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $livroDao->deletar($id);
    header("Location: ?page=livroControle&acao=listar");
}else if($acao == "get"){
    $id = $_GET['id'];

    $livro = $livroDao->get($id);
    include 'pages/formLivro.php';
}else if($acao == "buscar"){
    
    $filtro = $_POST['filtro'];
    $livro = $livroDao->buscar($filtro);

    include 'pages/listarLivro.php';

}
