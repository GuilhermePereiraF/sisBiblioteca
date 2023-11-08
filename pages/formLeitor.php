<h1>Cadastro de Leitor</h1>
    <form action="?page=leitorControle&acao=salvar" method="post">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" aria-describedby="emailHelp" name="nome">
  </div>
  <div class="mb-3">
    <label for="nascimento" class="form-label">Nascimento</label>
    <input type="date" class="form-control" id="nascimento" name="nascimento">
  </div>
  <div class="mb-3">
    <label for="sexo" class="form-label">Sexo</label>
    <input type="text" class="form-control" id="sexo" aria-describedby="emailHelp" name="sexo">
  </div>
  <div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="number" class="form-control" id="cpf" aria-describedby="emailHelp" name="cpf">
  </div>
  <div class="mb-3">
    <label for="rg" class="form-label">RG</label>
    <input type="number" class="form-control" id="rg" aria-describedby="emailHelp" name="rg">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
