<?php

require_once 'modelo/dominio/Emprestimo.php';
require_once 'modelo/dao/EmprestimoDao.php';

$emprestimoDao = new EmprestimoDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formEmprestimo.php';
} else if ($acao == "salvar") {
    $emprestimo = new Emprestimo();
    $emprestimo->setId($_POST['id']);
    $emprestimo->setLeitor($_POST['leitor']);
    $emprestimo->setRetirada($_POST['retirada']);
    $emprestimo->setPrazodevolucao($_POST['prazodevolucao']);
    $emprestimo->setDataDevolucao($_POST['datadevolucao']);
    $emprestimo->setMulta($_POST['multa']);
    $emprestimo->setLivro($_POST['livro']);


    $emprestimoDao->salvar($emprestimo);

    header("Location: ?page=emprestimoControle&acao=listar");
} else if ($acao == "listar") {
    $emprestimo = $emprestimoDao->listar();
    include 'pages/listarEmprestimo.php';
} else if ($acao == "alterar") {
   
    $emprestimo = new Emprestimo();
    $emprestimo->setId($_POST['id']);
    $emprestimo->setLeitor($_POST['leitor']);
    $emprestimo->setRetirada($_POST['retirada']);
    $emprestimo->setPrazodevolucao($_POST['prazodevolucao']);
    $emprestimo->setDataRevolucao($_POST['datadevolucao']);
    $emprestimo->setMulta($_POST['multa']);
    $emprestimo->setLivro($_POST['livro']);
    $emprestimoDao->atualizar($emprestimo);

    header("Location: ?page=emprestimoControle&acao=listar");
    
} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $emprestimoDao->deletar($id);
    header("Location: ?page=emprestimoControle&acao=listar");
}else if($acao == "get"){
    $id = $_GET['id'];

    $emprestimo = $emprestimoDao->get($id);
    include 'pages/formEmprestimo.php';
}else if($acao == "buscar"){
    
    $filtro = $_POST['filtro'];
    $emprestimo = $emprestimoDao->buscar($filtro);

    include 'pages/listarEmprestimo.php';

}
