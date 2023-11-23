<h1>Cadastro de Livro</h1>
      <form action="?page=livroControle&acao=salvar" method="post">
            <div class="mb-3">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" aria-describedby="emailHelp" name="titulo">
            </div>
            <div class="mb-3">
              <label for="autor" class="form-label">Autor</label>
              <input type="text" class="form-control" id="autor" aria-describedby="emailHelp" name="autor">
            </div>
            <div class="mb-3">
              <label for="editora" class="form-label">Editora</label>
              <input type="text" class="form-control" id="editora" name="editora">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>