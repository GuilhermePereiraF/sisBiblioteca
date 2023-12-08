<?php
require_once 'utilidade/ConexaoBD.php';
class LeitorDao {

    public function salvar($leitor)
    {
        //  try {

            $ConexaoBD = new ConexaoBD();
            $Conexao = $ConexaoBD->getConexaoBD();

        $nome = $leitor->getNome();
        $nascimento = $leitor->getNascimento();
        $sexo = $leitor-> getSexo();
        $rg = $leitor->getRg();
        $id = $leitor->getId();
        $cpf = $leitor->getCpf();

        $query = $Conexao->prepare('INSERT INTO leitor(nome,nascimento, sexo, rg) VALUES (:nome, :nascimento, :sexo, :rg)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':nascimento', $nascimento);
        $query->bindParam(':sexo', $sexo);
        $query->bindParam(':rg', $rg);



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
        $query = $Conexao->prepare('SELECT id, nome, nascimento, sexo, rg FROM leitor');
        $query->execute();
        $leitores = $query->fetchAll(PDO::FETCH_CLASS);

        return $leitores;

    }

    public function deletar($id)
    {
       $ConexaoBD = new ConexaoBD();
       $Conexao = $ConexaoBD->getConexaoBD();
        
        $query = $Conexao->prepare('delete from leitor where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($leitor)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $nome = $leitor->getNome();
        $nascimento = $leitor->getNascimento();
        $sexo = $leitor->getSexo();
        $id = $leitor->getId();

        $query = $Conexao->prepare('update leitor set nome=:nome, nascimento=:nascimento, sexo=:sexo where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->bindParam(':sexo', $sexo);
        $query->bindParam(':nascimento', $nascimento);
        $query->execute();
        
    }

    public function get($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $query = $Conexao->prepare('SELECT id, nome, nascimento, sexo FROM leitor WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $leitores[0];

    }

    public function buscar($filtro){
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $filtro = "%".$filtro."%";

        $query = $Conexao->prepare('SELECT id, nome, nascimento, sexo, rg FROM leitor WHERE nome like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $leitores = $query->fetchAll(PDO::FETCH_CLASS);

        return $leitores;
    }
}