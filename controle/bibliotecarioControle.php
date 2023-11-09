<?php

require_once 'modelo/dominio/Bibliotecario.php';
require_once 'modelo/dao/BibliotecarioDao.php';

$bibliotecarioDao = new BibliotecarioDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formBibliotecario.php';
} else if ($acao == "salvar") {
    $bibliotecario = new Bibliotecario();
    $bibliotecario->setNome($_POST['nome']);
    $bibliotecario->setTelefone($_POST['telefone']);
    $bibliotecario->setMatricula($_POST['matricula']);
    $bibliotecario->setEmail($_POST['email']);
    $bibliotecario->setRG($_POST['rg']);

    $BibliotecarioDao->salvar($bibliotecario);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
