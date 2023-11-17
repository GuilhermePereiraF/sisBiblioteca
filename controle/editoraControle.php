<?php

require_once 'modelo/dominio/Editora.php';
require_once 'modelo/dao/EditoraDao.php';

$editoraDao = new EditoraDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formEditora.php';
} else if ($acao == "salvar") {
    $editora = new Editora();
    $editora->setId($_POST['id']);
    $editora->setNome($_POST['nome']);
    $editora->setTelefone($_POST['telefone']);
    $editora->setArea($_POST['area']);
    $editora->setTipoPublicacao($_POST['tipopublicacao']);

    $editoraDao->salvar($editora);

    header("Location: ?page=editoraControle&acao=listar");
} else if ($acao == "listar") {
    $editora = $editoraDao->listar();
    include 'pages/listarEditora.php';
} else if ($acao == "alterar") {
   
    $editora = new Editora();
    $editora->setId($_POST['id']);
    $editora->setNome($_POST['nome']);
    $editora->setTelefone($_POST['telefone']);
    $editora->setArea($_POST['area']);
    $editora->setTipoPublicacao($_POST['tipopublicacao']);
    $editoraDao->atualizar($editora);

    header("Location: ?page=editoraControle&acao=listar");
    
} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $editoraDao->deletar($id);
    header("Location: ?page=editoraControle&acao=listar");
}else if($acao == "get"){
    $id = $_GET['id'];

    $editora = $editoraDao->get($id);
    include 'pages/formEditora.php';
}else if($acao == "buscar"){
    
    $filtro = $_POST['filtro'];
    $editora = $editoraDao->buscar($filtro);

    include 'pages/listarEditora.php';

}
