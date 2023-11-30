<?php
include 'utilidade/conexao.php';
class EditoraDao
{

    public function salvar($editora)
    {
        //  try {

        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $nome = $editora->getNome();
        $telefone = $editora->getTelefone();
        $area = $editora->getArea();
        $tipoPublicacao = $editora->getTipopublicacao();
        $Id = $editora->getId();


        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO editora(nome,telefone,area,tipopubicacao) VALUES (:nome,telefone,area,tipopublicacao)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':telefone', $telefone);
        $query->bindParam(':area', $area);
        $query->bindParam(':tipopublicacao', $tipoPublicacao);
      



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

        $query = $conexao->prepare('SELECT nome FROM editora');
        $query->execute();
        $editoras = $query->fetchAll(PDO::FETCH_CLASS);

        return $editoras;
    }

    public function deletar($id)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from editora where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($editora)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $nome = $editora->getNome();
        $id = $editora->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update editora set nome=:nome where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->execute();
    }
    public function get($id){
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();
        
        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, telefone FROM edtiora WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $editoras[0];

    }

}

    