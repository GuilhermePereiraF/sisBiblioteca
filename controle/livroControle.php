<?php

require_once 'modelo/dominio/Livro.php';
require_once 'modelo/dao/LivroDao.php';

require_once 'modelo/dominio/Leitor.php';
require_once 'modelo/dao/LeitorDao.php';

$LivroDao = new LivroDao();
$leitorDao = new LeitorDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {

    $livros = $LivroDao->listar();

    include 'pages/formLivro.php';
} else if ($acao == "salvar") {
    $livro = new Livro();
    $livro->setId($_POST['id']);
    $livro->setAutor($_POST['autor']);
    $livro->setTitulo($_POST['titulo']);
    $livro->setEditora($_POST['editora']);
    $livro->setArea($_POST['area']);

    $LivroDao->salvar($livro);

 header("Location: ?page=livroControle&acao=listar");
} else if ($acao == "listar") {
    $livro = $LivroDao->listar();
    include 'pages/listarLivro.php';
} else if ($acao == "alterar") {
   
    $livro = new Livro();
    $livro->setId($_POST['id']);
    $livro->setAutor($_POST['autor']);
    $livro->setTitulo($_POST['titulo']);
    $livro->setEditora($_POST['editora']);
    $livro->setArea($_POST['area']);
    $livroDao->atualizar($livro);

    header("Location: ?page=livroControle&acao=listar");
    
} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $LivroDao->deletar($id);
    header("Location: ?page=livroControle&acao=listar");
}else if($acao == "get"){
    $id = $_GET['id'];

    $livro = $LivroDao->get($id);
    include 'pages/formLivro.php';
}else if($acao == "buscar"){
    
    $filtro = $_POST['filtro'];
    $livro = $LivroDao->buscar($filtro);

    $livro = $LivroDao->buscar($filtro);


    include 'pages/listarLivro.php';

}
