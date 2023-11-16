<h3 style="margin:15px;">BIBLIOTECÁRIOS</h3>
<hr />
<div class="row" style="padding:15px;">
    <div class="col-5">
        <a class="btn btn-info" href="?page=leitorControle"> <i class="bi bi-file"></i><br /> NOVO</a>
    </div>
    <div class="col-7">
        <form class="d-flex" role="search">            
            <input class="form-control me-2" type="search" placeholder="Pesquise pelo nome do aluno" aria-label="Search">
            <button class="btn btn-info" type="submit"><i class="bi bi-search"></i> Buscar</button>
        </form>
    </div>
</div>


<table class="table">
    <tr>
        <th>NOME</th>
        <th>NASCIMENTO</th>
        <th>TELEFONE</th>
        <th>RG</th>
        <th>EMAIL</th>
        <th>MATRÍCULA</th>
        <th class="text-center">Editar</th>
        <th class="text-center">Excluir</th>
    </tr>

    <?php foreach ($bibliotecarios as $bibliotecario) { ?>
        <tr>
            <td><?php echo $bibliotecario->nome; ?></td>
            <td><?php echo date('d/m/Y', strtotime($bibliotecario->nascimento)); ?></td>
            <td><?php echo $bibliotecario->telefone; ?></td>
            <td><?php echo $bibliotecario->rg; ?></td>
            <td><?php echo $bibliotecario->email; ?></td>
            <td><?php echo $bibliotecario->matricula; ?></td>
            <td class="text-center">
                <a href="#" class="btn btn-warning">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
            <td class="text-center">
                <a href="#" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
    <?php } ?>  
</table>