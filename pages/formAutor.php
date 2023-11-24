<h1 class="h3 mb-3 fw-normal">CADASTRO DE AUTOR(A)</h1>
<form method="post" action="?page=autorControle">
<?php if($autor!=null){
       ?>
       <input type="hidden" name="id" value="<?php echo $autor->id; ?>"/>
       <?php
       $autor=$autor->nome;
       $acao = "alterar"; 
    }else{
        $nome='';
        $acao = "salvar";
    }
    ?>  
    
    <form action="?page=leitorControle&acao=salvar" method="post">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome da Autor</label>
    <input type="text" class="form-control" id="nome" aria-describedby="emailHelp" name="nome">
  </div>
  <div class="mb-3">
    <label for="nascimento" class="form-label">Publicações/Obras</label>
    <input type="text" class="form-control" id="publicações" name="publicações">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>