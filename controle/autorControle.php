<?php

require_once 'modelo/dominio/Autor.php';
require_once 'modelo/dao/AutorDao.php';

$AutorDao = new AutorDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formAutor.php';
} else if ($acao == "salvar") {
    $autor = new Leitor();
    $autor->setNome($_POST['nome']);
    $autor->setObras($_POST['obras']);

    $autorDao->salvar($Autor);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
