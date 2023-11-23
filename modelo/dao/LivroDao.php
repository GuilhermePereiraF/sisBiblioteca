<?php

class LivroDao
{

    public function salvar($livro)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "mydb";

        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $editora = $livro->getEditora();
        $id = $livro->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO livro(titulo, autor, editora, area) VALUES (:titulo, :autor, :editora, :area');
        $query->bindParam(':titulo', $titulo);
        $query->bindParam(':autor', $autor);
        $query->bindParam(':editora', $editora);
        $query->bindParam(':area', $area);



        $query->execute();

        //    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  $conexao->exec('SET NAMES "utf8"');

        // } catch (Exception $e) {
        //    print $e->getMessage();
        //  exit();
        // }
    }

    public function listar()
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "mydb";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, titulo, autor_id, editora_id FROM livro');
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $alunos;

    }

    public function deletar($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "mydb";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from pessoa where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($aluno)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "curso";

        $nome = $aluno->getNome();
        $nascimento = $aluno->getNascimento();
        $sexo = $aluno->getSexo();
        $id = $aluno->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update pessoa set nome=:nome, nascimento=:nascimento, sexo=:sexo where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->bindParam(':sexo', $sexo);
        $query->bindParam(':nascimento', $nascimento);
        $query->execute();
        
    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, nascimento, sexo FROM pessoa WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $alunos[0];

    }

    public function buscar($filtro){
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "curso";

        $filtro = "%".$filtro."%";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, nascimento, sexo FROM pessoa WHERE nome like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $alunos;
    }
}
