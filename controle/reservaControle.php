<?php

require_once 'modelo/dominio/Reserva.php';
require_once 'modelo/dao/ReservaDao.php';

$ReservaDao = new ReservaDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formReserva.php';
} else if ($acao == "salvar") {
    $reserva = new Leitor();
    $reserva->setNome($_POST['leitor']);
    $reserva->setNascimento($_POST['dataprazo']);
    $reserva->setCpf($_POST['cpf']);
    $reserva->setRG($_POST['rg']);

    $ReservaDao->salvar($reserva);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
