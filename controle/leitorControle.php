<?php

require_once 'modelo/dominio/Leitor.php';
require_once 'modelo/dao/LeitorDao.php';

$leitorDao = new LeitorDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formLeitor.php';
} else if ($acao == "salvar") {
    $leitor = new Leitor();
    $leitor->setNome($_POST['nome']);
    $leitor->setNascimento($_POST['nascimento']);
    $leitor->setCpf($_POST['cpf']);
    $leitor->setRG($_POST['rg']);

    $LeitorDao->salvar($leitor);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
