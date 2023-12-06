<?php
include 'utilidade/ConexaoBD.php';
class AutorDao
{

    public function salvar($autor)
    {
        //  try {

            $ConexaoBD = new ConexaoBD();
            $Conexao = $ConexaoBD->getConexaoBD();

        $nome = $autor->getNome();
        $telefone = $autor->getObras();
        $id = $autor->getId();

        $Conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $Conexao->prepare('INSERT INTO autor(nome,obras) VALUES (:nome, :obras)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':obras', $obras);



        $query->execute();

        //    $Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  $Conexao->exec('SET NAMES "utf8"');

        // } catch (Exception $e) {
        //    print $e->getMessage();
        //  exit();
        // }
    }

    public function listar()
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $query = $Conexao->prepare('SELECT nome, obras FROM autor');
        $query->execute();
        $autors = $query->fetchAll(PDO::FETCH_CLASS);

        return $autors;
    }

    public function deletar($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();
        
        $query = $Conexao->prepare('delete from autor where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($autor)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $nome = $aluno->getNome();
        $id = $aluno->getId();

        $query = $Conexao->prepare('update autor set nome=:nome where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->execute();
        
    }
}