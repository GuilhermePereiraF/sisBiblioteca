<?php

require_once 'modelo/dominio/Reserva.php';
require_once 'modelo/dao/ReservaDao.php';

$ReservaDao = new ReservaDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formReserva.php';
} else if ($acao == "salvar") {
    $reserva = new Reserva();

    $reserva->setLeitor($_POST['leitor']);
    $reserva->setDataPrazo($_POST['dataprazo']);
    $reserva->setSituacao($_POST['situacao']);
    $reserva->setLivro($_POST['livro']);


    
    $ReservaDao->salvar($reserva);

}  else if ($acao == "salvar") {
    $reserva = new Reserva();
    $reserva->set_Leitor($_POST['leitor']);
    $reserva->setDataPrazo($_POST['dataPrazo']);
    $reserva->setSituacao($_POST['situacao']);
    $reserva->setLivro($_POST['livro']);
    $reserva->setBibliotecario($_POST['bibliotecario']);



    $ReservaDao->salvar($Reserva);

    header("Location: ?page=reservaControle&acao=listar");
} else if ($acao == "listar") {
    $alunos = $ReservaDao->listar();
    include 'pages/listarReserva.php';
} else if ($acao == "alterar") {
   
    $reserva = new Reserva();
    $reserva->setId($_POST['id']);
    $reserva->setReserva($_POST['reserva']);
    $ReservaDao->atualizar($reserva);

    header("Location: ?page=reservaControle&acao=listar");
    
} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $ReservaDao->deletar($id);
    header("Location: ?page=reservaControle&acao=listar");
}else if($acao == "get"){
    $id = $_GET['id'];

    $reserva = $ReservaDao->get($id);
    include 'pages/formReserva.php';
}else if($acao == "buscar"){
    
    $filtro = $_POST['filtro'];
    $reserva = $ReservaDao->buscar($filtro);

    include 'pages/listarReserva.php';

}