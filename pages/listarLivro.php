<h3 style="margin:15px;">LIVROS</h3>
<hr />
<div class="row" style="padding:15px;">
    <div class="col-5">
        <a class="btn btn-info" href="?page=livroControle"> <i class="bi bi-file"></i><br /> NOVO</a>
    </div>
    <div class="col-7">
        <form class="d-flex" role="search" method="post" action="?page=livroControle">            
            <input class="form-control me-2" type="search" placeholder="Pesquise pelo nome do livro" aria-label="Search" name="filtro">
            <button value="buscar" name="acao" class="btn btn-info" type="submit"><i class="bi bi-search"></i> Buscar</button>
        </form>
    </div>
</div>


<table class="table">
    <tr>
        <th>TÍTULO</th>
        <th>EDITORA</th>
        <th>AUTOR</th>
        <th class="text-center">Editar</th>
        <th class="text-center">Excluir</th>
    </tr>

    <?php foreach ($livro as $livroS) { ?>
        <tr>
            <td><?php echo $livro->titulo; ?></td>
            <td><?php echo $livro->editora; ?></td>
            <td><?php echo $livro->autor; ?></td>
            <td class="text-center">
                <a href="?page=livroControle&acao=get&id=<?php echo $livro->id; ?>" class="btn btn-warning">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
            <td class="text-center">
                <a href="?page=livroControle&acao=excluir&id=<?php echo $livro->id; ?>" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
    <?php } ?>  
</table>



