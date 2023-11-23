<?php

class reservaDao
{

    public function salvar($bibiotecario)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "mydb";

        $nome = $bibliotecario->getNome();
        $telefone = $bibiotecario->gettelefone();
        $matricula = $bibiotecario-> getMatricula();
        $email = $bibiotecario->getEmail();
        $rg = $bibiotecario->getRg();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO reserva(leitor, dataPrazo, situacao, livro, bibliotecario) VALUES (:leitor, :dataPrazo, :situacao, :livro, :bibliotecario)');
        $query->bindParam(':leitor', $leitor);
        $query->bindParam(':dataPrazo', $dataPrazo);
        $query->bindParam(':situacao', $situacao);
        $query->bindParam(':livro', $livro);
        $query->bindParam(':bibliotecario', $bibliotecario);



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
        $bd = "sisBiblioteca";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT leitor, dataPrazo, situacao, livro, bibliotecario FROM pessoa');
        $query->execute();
        $reservas = $query->fetchAll(PDO::FETCH_CLASS);

        return $alunos;

    }

    public function deletar($id)
    {
        $host = "localhost";
        $usuario = "root";
<<<<<<< HEAD
        $senha = "";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from reserva where id=:id');
=======
        $senha = "aluno";
        $bd = "sisBiblioteca";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from pessoa where id=:id');
>>>>>>> 328e3feb566746e180395c5b5ad44aab2995150d
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($reserva)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "sisBiblioteca";

        $nome = $aluno->getNome();
        $id = $aluno->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update pessoa set nome=:nome where id=:id');
        $query->bindParam(':situacao', $situacao);
        $query->bindParam(':id', $id);
        $query->execute();
        
    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "sisBiblioteca";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, nascimento FROM pessoa WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $reservas[0];

    }
}