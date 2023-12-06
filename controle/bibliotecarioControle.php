<?php

require_once 'modelo/dominio/Bibliotecario.php';
require_once 'modelo/dao/BibliotecarioDao.php';

$bibliotecarioDao = new BibliotecarioDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formBibliotecario.php';
} else if ($acao == "salvar") {
    $bibliotecario = new Bibliotecario();
    $bibliotecario->setId($_POST['id']);
    $bibliotecario->setNome($_POST['nome']);
    $bibliotecario->setTelefone($_POST['telefone']);
    $bibliotecario->setMatricula($_POST['matricula']);
    $bibliotecario->setEmail($_POST['email']);
    $bibliotecario->setRG($_POST['rg']);

    $bibliotecarioDao->salvar($bibliotecario);

    header("Location: ?page=bibliotecarioControle&acao=listar");
} else if ($acao == "listar") {
    $bibliotecarios = $bibliotecarioDao->listar();
    include 'pages/listarBibliotecario.php';
} else if ($acao == "alterar") {
   
    $bibliotecario = new Bibliotecario();
    $bibliotecario->setId($_POST['id']);
    $bibliotecario->setNome($_POST['nome']);
    $bibliotecario->setTelefone($_POST['telefone']);
    $bibliotecario->setMatricula($_POST['matricula']);
    $bibliotecario->setEmail($_POST['email']);
    $bibliotecario->setRG($_POST['rg']);
    $bibliotecarioDao->atualizar($bibliotecario);

    header("Location: ?page=bibliotecarioControle&acao=listar");
    
} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $bibliotecarioDao->deletar($id);
    header("Location: ?page=bibliotecarioControle&acao=listar");
}else if($acao == "get"){
    $id = $_GET['id'];

    $bibliotecario = $bibliotecarioDao->get($id);
    include 'pages/formBibliotecario.php';
}else if($acao == "buscar"){
    
    $filtro = $_POST['filtro'];
    $bibliotecario = $bibliotecarioDao->buscar($filtro);

    include 'pages/listarBibliotecario.php';

}
