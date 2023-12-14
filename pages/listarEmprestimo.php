
<h3 style="margin:15px;">EMPRESTIMO</h3>
<hr />
<div class="row" style="padding:15px;">
    <div class="col-5">
        <a class="btn btn-info" href="?page=emprestimoControle"> <i class="bi bi-file"></i><br /> NOVO</a>
    </div>
    <div class="col-7">
        <form class="d-flex" role="search" method="post" action="?page=emprestimoControle">            
            <input class="form-control me-2" type="search" placeholder="Pesquise pelo nome do emprestimo" aria-label="Search" name="filtro">
            <button value="buscar" name="acao" class="btn btn-info" type="submit"><i class="bi bi-search"></i> Buscar</button>
        </form>
    </div>
</div>


<table class="table">
    <tr>
        <th>NOME</th>
        <th>NASCIMENTO</th>
        <th>SEXO</th>
        <th class="text-center">Editar</th>
        <th class="text-center">Excluir</th>
    </tr>

    <?php foreach ($emprestimos as $emprestimo) { ?>
        <tr>
            <td><?php echo $emprestimo->leitor; ?></td>
            <td><?php echo date('d/m/Y', strtotime($emprestimo->prazo_devolucao )); ?></td>
            <td><?php echo date('d/m/Y', strtotime($emprestimo->data_devolucao)); ?></td>
            <td><?php echo $emprestimo->multa; ?></td>
            <td><?php echo $emprestimo->livro; ?></td>

            <td class="text-center">
                <a href="?page=emprestimoControle&acao=get&id=<?php echo $emprestimo->id; ?>" class="btn btn-warning">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
            <td class="text-center">
                <a href="?page=emprestimoControle&acao=excluir&id=<?php echo $emprestimo->id; ?>" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
    <?php } ?>  
</table>