<?php

require_once 'modelo/dominio/Autor.php';
require_once 'modelo/dao/AutorDao.php';

$autorDao = new AutorDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formAutor.php';
} else if ($acao == "salvar") {
    $autor = new Autor();
    $autor->setId($_POST['id']);
    $autor->setNome($_POST['nome']);
    $autor->setObras($_POST['obras']);
    $autorDao->salvar($autor);

    header("Location: ?page=autorControle&acao=listar");
} else if ($acao == "listar") {
    $autor = $autorDao->listar();
    include 'pages/listarAutor.php';
} else if ($acao == "alterar") {
   
    $autor = new Autor();
    $autor->setId($_POST['id']);
    $autor->setNome($_POST['nome']);
    $autor->setObras($_POST['obras']);
    $autorDao->atualizar($autor);

    header("Location: ?page=autorControle&acao=listar");
    
} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $autorDao->deletar($id);
    header("Location: ?page=autorControle&acao=listar");
}else if($acao == "get"){
    $id = $_GET['id'];

    $autor = $autorDao->get($id);
    include 'pages/formAutor.php';
}else if($acao == "buscar"){
    
    $filtro = $_POST['filtro'];
    $autor = $autorDao->buscar($filtro);

    include 'pages/listarAutor.php';

}