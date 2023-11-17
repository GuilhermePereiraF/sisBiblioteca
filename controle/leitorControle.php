<?php

require_once 'modelo/dominio/Leitor.php';
require_once 'modelo/dao/LeitorDao.php';

$leitorDao = new LeitorDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formLeitor.php';
} else if ($acao == "salvar") {
    $leitor = new Leitor();
    $leitor->setId($_POST['id']);
    $leitor->setNome($_POST['nome']);
    $leitor->setNascimento($_POST['nascimento']);
    $leitor->setRG($_POST['rg']);

    $leitorDao->salvar($leitor);

    header("Location: ?page=leitorControle&acao=listar");
} else if ($acao == "listar") {
    $leitor = $leitorDao->listar();
    include 'pages/listarLeitor.php';
} else if ($acao == "alterar") {
   
    $leitor = new Leitor();
    $leitor->setId($_POST['id']);
    $leitor->setNome($_POST['nome']);
    $leitor->setNascimento($_POST['nascimento']);
    $leitor->setRG($_POST['rg']);
    $leitorDao->atualizar($leitor);

    header("Location: ?page=leitorControle&acao=listar");
    
} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $leitorDao->deletar($id);
    header("Location: ?page=leitorControle&acao=listar");
}else if($acao == "get"){
    $id = $_GET['id'];

    $leitor = $leitorDao->get($id);
    include 'pages/formLeitor.php';
}else if($acao == "buscar"){
    
    $filtro = $_POST['filtro'];
    $leitor = $leitorDao->buscar($filtro);

    include 'pages/listarLeitor.php';

}
