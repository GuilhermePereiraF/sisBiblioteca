<?php

require_once 'modelo/dominio/Area.php';
require_once 'modelo/dao/AreaDao.php';

$AreaDao = new AreaDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formArea.php';
} else if ($acao == "salvar") {
    $area = new Area();
    $area->setNome($_POST['nome']);

    $leitorDao->salvar($area);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
