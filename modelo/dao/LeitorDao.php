<?php

class LeitorDao
{

    public function salvar($leitor)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "mydb";

        $nome = $leitor->getNome();
        $nascimento = $leitor->getNascimento();
        $sexo = $leitor-> getSexo();
        $rg = $leitor->getRg();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO leitor(nome,nascimento, sexo, rg) VALUES (:nome, :nascimento, :sexo, :rg)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':nascimento', $nascimento);
        $query->bindParam(':sexo', $sexo);
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
        $bd = "mydb";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('SELECT nome, nascimento, sexo, rg FROM leitor');
        $query->execute();
        $leitores = $query->fetchAll(PDO::FETCH_CLASS);

        return $leitores;

    }

    public function deletar($id)
    {
    }

    public function atualizar($leitor)
    {
        
    }
}