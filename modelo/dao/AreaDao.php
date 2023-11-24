<?php

class AreaDao
{

    public function salvar($area)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "mydb";

        $nome = $area->getNome();
        $id = $area->getId();


        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO area(nome,) VALUES (:nome)');
        $query->bindParam(':nome', $nome);




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

        $query = $conexao->prepare('SELECT id, nome FROM area');
        $query->execute();
        $editoras = $query->fetchAll(PDO::FETCH_CLASS);

        return $areas;
    }

    public function deletar($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from area where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }


    public function atualizar($area)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $id = $area->getId();
        $nome = $area->getNome();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update area set nome=:nome where id=:id');
        $query->bindParam(':id', $id);
        $query->bindParam(':nome', $nome);
        $query->execute();
    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome FROM area WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $areas[0];

    }
}
