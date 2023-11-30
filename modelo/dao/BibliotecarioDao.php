<?php
include 'utilidade/conexao.php';
class BibliotecarioDao
{

    public function salvar($bibiotecario)
    {
        //  try {

        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $nome = $bibliotecario->getNome();
        $telefone = $bibliotecario->getTelefone();
        $matricula = $bibliotecario-> getMatricula();
        $email = $bibliotecario->getEmail();
        $rg = $bibliotecario->getRg();
        $id = $bibliotecario->getId();

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
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, telefone, matricula, email, rg FROM bibliotecario');
        $query->execute();
        $bibliotecariox = $query->fetchAll(PDO::FETCH_CLASS);

        return $bibliotecariox;

    }

    public function deletar($id)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from bibliotecario where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($bibliotecario)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $nome = $bibliotecario->getNome();
        $telefone = $bibliotecario->getTelefone();
        $matricula = $bibliotecario->getMatricula();
        $email = $bibliotecario->getEmail();
       

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update bibliotecario set nome=:nome, telefone=:telefone, matricula=:matricula, email=:email where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->bindParam(':telefone', $telefone);
        $query->bindParam(':matricula', $matricula);
        $query->bindParam(':email', $email);
        $query->execute();
        
    }

    public function get($id)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, telefone, matricula, email FROM bibliotecario WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $bibliotecariox = $query->fetchAll(PDO::FETCH_CLASS);

        return $bibliotecariox[0];

    }

    public function buscar($filtro){
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $filtro = "%".$filtro."%";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, telefone, matricula, email FROM bibliotecario WHERE nome like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $bibliotecariox = $query->fetchAll(PDO::FETCH_CLASS);

        return $bibliotecariox;
    }
}
