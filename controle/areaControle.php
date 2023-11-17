<?php

require_once 'modelo/dominio/Area.php';
require_once 'modelo/dao/AreaDao.php';

$AreaDao = new AreaDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formArea.php';
} else if ($acao == "salvar") {
    $area = new Area();
    $area->setNome($_POST['nome']);

    $AreaDao->salvar($area);

  header("Location: ?page=areaControle&acao=listar");
} else if ($acao == "listar") {
    $area = $AreaDao->listar();
    include 'pages/listarArea.php';
} else if ($acao == "alterar") {
   
    $area = new Area();
    $area->setId($_POST['id']);
    $area->setArea($_POST['area']);
    $AreaDao->atualizar($reserva);

    header("Location: ?page=areaControle&acao=listar");
    
} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $AreaDao->deletar($id);
    header("Location: ?page=areaControle&acao=listar");
}else if($acao == "get"){
    $id = $_GET['id'];

    $area = $AreaDao->get($id);
    include 'pages/formArea.php';
}else if($acao == "buscar"){
    
    $filtro = $_POST['filtro'];
    $alunos = $AreaDao->buscar($filtro);

    include 'pages/listarArea.php';

};