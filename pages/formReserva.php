<h1 class="h3 mb-3 fw-normal">CADASTRO DE RESERVA</h1>
<form method="post" action="?page=reservaControle">
<?php if(isset($reserva)){
       ?>
       <input type="hidden" name="id" value="<?php echo $reserva->id; ?>"/>
       <?php
       $reserva=$reserva->leitor;
       $acao = "alterar"; 
    }else{
        $leitor='';
        $situacao = '';
        $acao = "salvar";
    }
    ?>     

<div class="row mb-3">
        <label for="leitor" class="col-sm-2 col-form-label">Leitor</label>
        <div class="col-sm-10">
            <select class="form-control" id="leitor" name="leitor">
                <option value="">selecione</option>
                <?php foreach($leitores as $leitor){ ?> 
                    <option value="<?php echo $leitor->id; ?>"><?php echo $leitor->nome; ?></option>
                <?php } ?>
                
            </select>

            
        </div>
    </div>
    <div class="row mb-3">
        <label for="dataprazo" class="col-sm-2 col-form-label">Data prazo</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="dataprazo" name="dataprazo">
        </div>
    </div>
    <div class="row mb-3">
        <label for="situacao" class="col-sm-2 col-form-label">Situação</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="situacao" name="situacao" value="<?php echo $situacao; ?>">
        </div>
    </div>
    <div class="row mb-3">

        <label for="livro" class="col-sm-2 col-form-label">Livro</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="situacao" name="situacao" value="<?php echo $situacao; ?>">
        </div>
    </div>
    <button value="<?php echo $acao; ?>" name="acao" type="submit" class="btn btn-primary">Salvar</button>
</form>