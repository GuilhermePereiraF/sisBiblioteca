<?php
include 'utilidade/conexao.php';
class AutorDao
{

    public function salvar($autor)
    {
        //  try {

        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $nome = $autor->getNome();
        $telefone = $autor->getObras();
        $id = $autor->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO autor(nome,obras) VALUES (:nome, :obras)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':obras', $obras);



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
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT nome, obras FROM autor');
        $query->execute();
        $autors = $query->fetchAll(PDO::FETCH_CLASS);

        return $autors;
    }

    public function deletar($id)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from autor where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($autor)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $nome = $aluno->getNome();
        $id = $aluno->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update autor set nome=:nome where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->execute();
        
    }
}