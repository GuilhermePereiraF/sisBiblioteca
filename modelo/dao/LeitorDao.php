<?php
include 'utilidade/conexao.php';
class LeitorDao {

    public function salvar($leitor)
    {
        //  try {

            $conexaoBD = new ConexaoBD();
            $conexao = $conexaoBD->getConexaoBD();

        $nome = $leitor->getNome();
        $nascimento = $leitor->getNascimento();
        $sexo = $leitor-> getSexo();
        $rg = $leitor->getRg();
        $id = $leitor->getId();
        $cpf = $leitor->getCpf();

        $query = $conexaoBD->prepare('INSERT INTO leitor(nome,nascimento, sexo, rg) VALUES (:nome, :nascimento, :sexo, :rg)');
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
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexaoBD();

        $query = $conexaoBD->prepare('SELECT id, nome, nascimento, sexo FROM leitor');
        $query->execute();
        $leitores = $query->fetchAll(PDO::FETCH_CLASS);

        return $leitores;

    }

    public function deletar($id)
    {
       $conexaoBD = new ConexaoBD();
       $conexao = $conexaoBD->getConexaoBD();
        
        $query = $conexao->prepare('delete from leitor where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($leitor)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexaoBD();

        $nome = $leitor->getNome();
        $nascimento = $leitor->getNascimento();
        $sexo = $leitor->getSexo();
        $id = $leitor->getId();

        $query = $conexao->prepare('update leitor set nome=:nome, nascimento=:nascimento, sexo=:sexo where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->bindParam(':sexo', $sexo);
        $query->bindParam(':nascimento', $nascimento);
        $query->execute();
        
    }

    public function get($id)
    {
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexaoBD();

        $query = $conexao->prepare('SELECT id, nome, nascimento, sexo FROM leitor WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $leitores[0];

    }

    public function buscar($filtro){
        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexaoBD();

        $filtro = "%".$filtro."%";

        $query = $conexao->prepare('SELECT id, nome, nascimento, sexo, rg FROM leitor WHERE nome like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $leitores = $query->fetchAll(PDO::FETCH_CLASS);

        return $leitores;
    }
}