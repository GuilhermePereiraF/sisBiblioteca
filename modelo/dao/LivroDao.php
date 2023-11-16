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
        $autor = $bibiotecario->getAutor();
        $matricula = $bibiotecario-> getEditora();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO bibliotecario(titulo, autor, editora, area) VALUES (:titulo, :autor, :editora, :area');
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
    }

    public function deletar($id)
    {
    }

    public function atualizar($livro)
    {
    }
}