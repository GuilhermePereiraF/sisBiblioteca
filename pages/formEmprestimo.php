<h1 class="h3 mb-3 fw-normal">CADASTRO DE EMPRESTIMO</h1>
<form method="post" action="?page=emprestimoControle">
<?php if($emprestimo!=null){
       ?>
       <input type="hidden" name="id" value="<?php echo $emprestimo->id; ?>"/>
       <?php
       $emprestimo=$emprestimo->leitor;
       $acao = "alterar"; 
    }else{
        $leitor='';
        $acao = "salvar";
    }
    ?>     

<div class="row mb-3">
        <label for="livro" class="col-sm-2 col-form-label">Livro</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="livro" name="livro" value="<?php echo $livro; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="dataemprestimo" class="col-sm-2 col-form-label">Data de emprestimo/Retirada</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="dataemprestimo" name="dataemprestimo">
        </div>
    <div class="row mb-3">
        <label for="dataprazo" class="col-sm-2 col-form-label">Data prazo de devolução</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="dataprazo" name="dataprazo">
        </div>
    </div>
    <div class="row mb-3">
        <label for="situacao" class="col-sm-2 col-form-label">Multa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="multa" name="multa" value="<?php echo $situacao; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="livro" class="col-sm-2 col-form-label">Leitor</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="leitor" name="leitor" value="<?php echo $leitor; ?>">
        </div>
    </div>
    <button value="<?php echo $acao; ?>" name="acao" type="submit" class="btn btn-primary">Salvar</button>
</form>