<?php

require_once 'modelo/dominio/Livro.php';
require_once 'modelo/dao/LivroDao.php';

$leitorDao = new LivroDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formLivro.php';
} else if ($acao == "salvar") {
    $livro = new Livro();
    $livro->setNome($_POST['autor']);
    $livro->setNascimento($_POST['titulo']);
    $livro->setCpf($_POST['editora']);

    $livroDao->salvar($livro);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
