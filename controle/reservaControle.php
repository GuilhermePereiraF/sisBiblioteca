<?php

require_once 'modelo/dominio/Reserva.php';
require_once 'modelo/dao/ReservaDao.php';

require_once 'modelo/dominio/Leitor.php';
require_once 'modelo/dao/LeitorDao.php';


$leitorDao = new LeitorDao();
$ReservaDao = new ReservaDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {

    $leitores = $leitorDao->listar();

    include 'pages/formReserva.php';
} else if ($acao == "salvar") {
    $reserva = new Reserva();

    $reserva->setLeitor($_POST['leitor']);
    $reserva->setDataprazo($_POST['dataprazo']);
    $reserva->setsituacao($_POST['situacao']);
    $reserva->setLivro_id($_POST['Livro_id']);

    $ReservaDao->salvar($reserva);

}  else if ($acao == "salvar") {
    $reserva = new Reserva();
    $reserva->setLeitor($_POST['leitor']);
    $reserva->setDataprazo($_POST['dataprazo']);
    $reserva->setsituacao($_POST['situacao']);
    $reserva->setLivro_id($_POST['Livro_id']);
    $reserva->setBibliotecario($_POST['bibliotecario']);



    $ReservaDao->listar($reserva);

    header("Location: ?page=reservaControle&acao=listar");
} else if ($acao == "listar") {
    $alunos = $ReservaDao->listar();
    include 'pages/listarReserva.php';
} else if ($acao == "alterar") {
   
    $reserva = new Reserva();
    $reserva->setId($_POST['id']);
    $reserva->setreserva($_POST['reserva']);
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