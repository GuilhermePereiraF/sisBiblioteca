<h3 style="margin:15px;">RESERVAS</h3>
<hr />
<div class="row" style="padding:15px;">
    <div class="col-5">
        <a class="btn btn-info" href="?page=reservaControle"> <i class="bi bi-file"></i><br /> NOVO</a>
    </div>
    <div class="col-7">
        <form class="d-flex" role="search">            
            <input class="form-control me-2" type="search" placeholder="Pesquise pela reserva" aria-label="Search">
            <button class="btn btn-info" type="submit"><i class="bi bi-search"></i> Buscar</button>
        </form>
    </div>
</div>

<table class="table">
    <tr>
        <th>LEITOR</th>
        <th>DATA PRAZO</th>
        <th>SITUAÇÃO</th>
        <th>LIVRO</th>
        <th>BIBLIOTECARIO</th>
        <th class="text-center">Editar</th>
        <th class="text-center">Excluir</th>
    </tr>

    <?php foreach ($reservas as $reserva) { ?>
        <tr>
            <td><?php echo $reserva->leitor; ?></td>
            <td><?php echo date('d/m/Y', strtotime($reserva->dataPrazo)); ?></td>
            <td><?php echo $reserva->livro; ?></td>
            <td><?php echo $reserva->$bibliotecario; ?></td>
            <td class="text-center">
                <a href="?page=reservaControle&acao=get&id=<?php echo $reserva->id; ?>" class="btn btn-warning">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
            <td class="text-center">
                <a href="?page=reservaControle&acao=excluir&id=<?php echo $reserva->id; ?>" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
    <?php } ?>  
</table>