<?php

require_once 'modelo/dominio/Livro.php';
require_once 'modelo/dao/LivroDao.php';

$leitorDao = new LivroDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formLivro.php';
} else if ($acao == "salvar") {
    $livro = new Livro();
    $livro->setAutor($_POST['autor']);
    $livro->setTitulo($_POST['titulo']);
    $livro->setEditora($_POST['editora']);
    $livro->setArea($_POST['area']);

    $livroDao->salvar($livro);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
