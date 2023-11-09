<?php

require_once 'modelo/dominio/Editora.php';
require_once 'modelo/dao/EditoraDao.php';

$editoraDao = new EditoraDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formEditora.php';
} else if ($acao == "salvar") {
    $editora = new Editora();
    $editora->setNome($_POST['nome']);
    $editora->setTelefone($_POST['telefone']);
    $editora->setArea($_POST['area']);
    $editora->setTipoPublicacao($_POST['tipopublicacao']);

    $EditoraDao->salvar($leitor);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
