<h1 class="h3 mb-3 fw-normal">CADASTRO DE BIBLIOTECARIO</h1>
<form method="post" action="?page=bibliotecarioControle">
      <form action="?page=bibliotecarioControle&acao=salvar" method="post">
      <?php if($bibliotecario!=null){
       ?>
       <input type="hidden" name="id" value="<?php echo $bibliotecario->id; ?>"/>
       <?php
       $bibliotecario=$bibliotecario->nome;
       $acao = "alterar"; 
    }else{
        $nome='';
        $acao = "salvar";
    }
    ?> 
            <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" aria-describedby="emailHelp" name="nome">
            </div>
            <div class="mb-3">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="number" class="form-control" id="telefone" name="telefone">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
              <label for="rg" class="form-label">RG</label>
              <input type="number" class="form-control" id="rg" name="rg">
            </div>
            <div class="mb-3">
              <label for="nascimento" class="form-label">Nascimento</label>
              <input type="date" class="form-control" id="nascimento" name="nascimento">
            </div>
            <div class="mb-3">
              <label for="matricula" class="form-label">Matricula</label>
              <input type="number" class="form-control" id="matricula" name="matricula">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>