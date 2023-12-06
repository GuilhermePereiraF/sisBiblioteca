<?php
include 'utilidade/ConexaoBD.php';
class BibliotecarioDao
{

    public function salvar($bibiotecario)
    {
        //  try {
            $ConexaoBD = new ConexaoBD();
            $Conexao = $ConexaoBD->getConexaoBD();

        $nome = $bibliotecario->getNome();
        $telefone = $bibliotecario->getTelefone();
        $matricula = $bibliotecario-> getMatricula();
        $email = $bibliotecario->getEmail();
        $rg = $bibliotecario->getRg();
        $id = $bibliotecario->getId();

        $query = $Conexao->prepare('INSERT INTO bibliotecario(nome,telefone,matricula, email, rg) VALUES (:nome, :telefone, :matricula, :email, :rg)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':telefone', $telefone);
        $query->bindParam(':matricula', $matricula);
        $query->bindParam(':email', $email);
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

        $query = $Conexao->prepare('SELECT id, nome, telefone, matricula, email, rg FROM bibliotecario');
        $query->execute();
        $bibliotecariox = $query->fetchAll(PDO::FETCH_CLASS);

        return $bibliotecariox;

    }

    public function deletar($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();
        
        $query = $Conexao->prepare('delete from bibliotecario where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($bibliotecario)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $nome = $bibliotecario->getNome();
        $telefone = $bibliotecario->getTelefone();
        $matricula = $bibliotecario->getMatricula();
        $email = $bibliotecario->getEmail();
       

        $query = $Conexao->prepare('update bibliotecario set nome=:nome, telefone=:telefone, matricula=:matricula, email=:email where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->bindParam(':telefone', $telefone);
        $query->bindParam(':matricula', $matricula);
        $query->bindParam(':email', $email);
        $query->execute();
        
    }

    public function get($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $query = $Conexao->prepare('SELECT id, nome, telefone, matricula, email FROM bibliotecario WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $bibliotecariox = $query->fetchAll(PDO::FETCH_CLASS);

        return $bibliotecariox[0];

    }

    public function buscar($filtro){
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $filtro = "%".$filtro."%";


        $query = $Conexao->prepare('SELECT id, nome, telefone, matricula, email FROM bibliotecario WHERE nome like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $bibliotecariox = $query->fetchAll(PDO::FETCH_CLASS);

        return $bibliotecariox;
    }
}
