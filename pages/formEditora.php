<h1 class="h3 mb-3 fw-normal">CADASTRO DE EDITORA</h1>
<form method="post" action="?page=editoraControle">
<?php if($editora!=null){
       ?>
       <input type="hidden" name="id" value="<?php echo $editora->id; ?>"/>
       <?php
       $editora=$editora->nome;
       $acao = "alterar"; 
    }else{
        $nome ='';
        $acao = "salvar";
    }
    ?>  

    <form action="?page=editoraControle&acao=salvar" method="post">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome da Organização</label>
    <input type="text" class="form-control" id="nome" aria-describedby="emailHelp" name="nome">
  </div>
  <div class="mb-3">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="number" class="form-control" id="telefone" name="telefone">
  </div>
  <div class="mb-3">
    <label for="publicacoes" class="form-label">Publicações</label>
    <input type="text" class="form-control" id="publicações" name="publicações">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>