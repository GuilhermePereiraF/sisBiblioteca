<?php

class LeitorDao
{

    public function salvar($leitor)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "sisBiblioteca";

        $nome = $leitor->getNome();
        $nascimento = $leitor->getNascimento();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO pessoa(nome,nascimento) VALUES (:nome, :nascimento)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':nascimento', $nascimento);

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
    }

    public function deletar($id)
    {
    }

    public function atualizar($leitor)
    {
    }
}