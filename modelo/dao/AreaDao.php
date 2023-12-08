<?php
require_once 'utilidade/ConexaoBD.php';
class AreaDao
{

    public function salvar($area)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();
        
        $nome = $area->getNome();
        $id = $area->getId();


        $query = $Conexao->prepare('INSERT INTO area(nome,) VALUES (:nome)');
        $query->bindParam(':nome', $nome);




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

        $query = $Conexao->prepare('SELECT id, nome FROM area');
        $query->execute();
        $editoras = $query->fetchAll(PDO::FETCH_CLASS);

        return $areas;
    }

    public function deletar($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD(); 
        
        $query = $Conexao->prepare('delete from area where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }


    public function atualizar($area)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $id = $area->getId();
        $nome = $area->getNome();

        $query = $Conexao->prepare('update area set nome=:nome where id=:id');
        $query->bindParam(':id', $id);
        $query->bindParam(':nome', $nome);
        $query->execute();
    }

    public function get($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = ConexaoBD->getConexao ();

        $query = $Conexao->prepare('SELECT id, nome FROM area WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $areas[0];

    }
}
