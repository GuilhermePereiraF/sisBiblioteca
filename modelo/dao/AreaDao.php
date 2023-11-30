<?php
include 'utilidade/conexao.php';
class AreaDao
{

    public function salvar($area)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();
        
        $nome = $area->getNome();
        $id = $area->getId();


        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO area(nome,) VALUES (:nome)');
        $query->bindParam(':nome', $nome);




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

        $query = $conexao->prepare('SELECT id, nome FROM area');
        $query->execute();
        $editoras = $query->fetchAll(PDO::FETCH_CLASS);

        return $areas;
    }

    public function deletar($id)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from area where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }


    public function atualizar($area)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();
        $id = $area->getId();
        $nome = $area->getNome();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update area set nome=:nome where id=:id');
        $query->bindParam(':id', $id);
        $query->bindParam(':nome', $nome);
        $query->execute();
    }

    public function get($id)
    {
        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome FROM area WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $areas[0];

    }
}
