<?php

require_once 'modelo/dominio/Emprestimo.php';
require_once 'modelo/dao/EmprestimoDao.php';

$EmprestimoDao = new EmprestimoDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formEmprestimo.php';
} else if ($acao == "salvar") {
    $emprestimo = new Emprestimo();
    $emprestimo->setLeitor($_POST['leitor']);
    $emprestimo->setRetirada($_POST['retirada']);
    $emprestimo->setPrazodevolucao($_POST['prazodevolucao']);
    $emprestimo->setDataRevolucao($_POST['datadevolucao']);
    $emprestimo->setMulta($_POST['multa']);
    $emprestimo->setLivro($_POST['livro']);


    $EmprestimoDao->salvar($emprestimo);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
