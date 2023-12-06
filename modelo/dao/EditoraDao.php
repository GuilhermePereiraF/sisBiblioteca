<?php
include 'utilidade/ConexaoBD.php';
class EditoraDao
{

    public function salvar($editora)
    {
        //  try {

            $ConexaoBD = new ConexaoBD();
            $Conexao = $ConexaoBD->getConexaoBD();

        $nome = $editora->getNome();
        $telefone = $editora->getTelefone();
        $area = $editora->getArea();
        $tipoPublicacao = $editora->getTipopublicacao();
        $Id = $editora->getId();

        $query = $Conexao->prepare('INSERT INTO editora(nome,telefone,area,tipopubicacao) VALUES (:nome,telefone,area,tipopublicacao)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':telefone', $telefone);
        $query->bindParam(':area', $area);
        $query->bindParam(':tipopublicacao', $tipoPublicacao);
      



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

        $query = $Conexao->prepare('SELECT nome FROM editora');
        $query->execute();
        $editoras = $query->fetchAll(PDO::FETCH_CLASS);

        return $editoras;
    }

    public function deletar($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();
        
        $query = $Conexao->prepare('delete from editora where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($editora)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $nome = $editora->getNome();
        $id = $editora->getId();

        $query = $Conexao->prepare('update editora set nome=:nome where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->execute();
    }
    public function get($id){
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $query = $Conexao->prepare('SELECT id, nome, telefone FROM edtiora WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $editoras[0];

    }

}

    