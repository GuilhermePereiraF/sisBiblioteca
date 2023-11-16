<?php

class editoraDao
{

    public function salvar($editora)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "mydb";

        $nome = $editora->getNome();


        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO edtiora(nome,telefone) VALUES (:nome)');
        $query->bindParam(':nome', $nome);;
      



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

        $query = $conexao->prepare('SELECT nome FROM editora');
        $query->execute();
        $editoras = $query->fetchAll(PDO::FETCH_CLASS);

        return $editoras;
    }

    public function deletar($id)
    {
    }

    public function atualizar($editora)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "curso";

        $nome = $edtiora->getNome();
        $id = $editora->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update editora set nome=:nome where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, telefone FROM edtiora WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $editoras[0];

    }
}