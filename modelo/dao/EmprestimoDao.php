<?php

class emprestimoDao
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
    }

    public function deletar($id)
    {
    }

    public function atualizar($bibiotecario)
    {
    }
}