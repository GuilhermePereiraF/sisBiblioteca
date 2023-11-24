<?php

class BibliotecarioDao
{

    public function salvar($bibiotecario)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "mydb";

        $nome = $bibliotecario->getNome();
        $telefone = $bibliotecario->getTelefone();
        $matricula = $bibliotecario-> getMatricula();
        $email = $bibliotecario->getEmail();
        $rg = $bibliotecario->getRg();
        $id = $bibliotecario->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO bibliotecario(nome,telefone,matricula, email, rg) VALUES (:nome, :telefone, :matricula, :email, :rg)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':telefone', $telefone);
        $query->bindParam(':matricula', $matricula);
        $query->bindParam(':email', $email);
        $query->bindParam(':rg', $rg);



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
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, telefone, matricula, email, rg FROM bibliotecario');
        $query->execute();
        $bibliotecariox = $query->fetchAll(PDO::FETCH_CLASS);

        return $bibliotecariox;

    }

    public function deletar($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from bibliotecario where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($bibliotecario)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $nome = $bibliotecario->getNome();
        $telefone = $bibliotecario->getTelefone();
        $matricula = $bibliotecario->getMatricula();
        $email = $bibliotecario->getEmail();
       

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update bibliotecario set nome=:nome, telefone=:telefone, matricula=:matricula, email=:email where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->bindParam(':telefone', $telefone);
        $query->bindParam(':matricula', $matricula);
        $query->bindParam(':email', $email);
        $query->execute();
        
    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, telefone, matricula, email FROM bibliotecario WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $bibliotecariox = $query->fetchAll(PDO::FETCH_CLASS);

        return $bibliotecariox[0];

    }

    public function buscar($filtro){
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $filtro = "%".$filtro."%";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, telefone, matricula, email FROM bibliotecario WHERE nome like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $bibliotecariox = $query->fetchAll(PDO::FETCH_CLASS);

        return $bibliotecariox;
    }
}
