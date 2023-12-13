<?php
require_once 'utilidade/ConexaoBD.php';
class reservaDao
{

    public function salvar($reserva)
    {
        //  try {

            $ConexaoBD = new ConexaoBD();
            $Conexao = $ConexaoBD->getConexaoBD();

        $leitor = $reserva->getLeitor();
        $dataPrazo = $reserva->getDataPrazo();
        $situacaoleitor = $reserva-> getSituacaoleitor();
        $Livro_id = $reserva->getLivro_id();

        $query = $Conexao->prepare('INSERT INTO reserva(leitor_id, dataPrazo, situacaoleitor, livro_id) VALUES (:leitor_id, :dataPrazo, :situacaoleitor, :livro_id)');
        $query->bindParam(':leitor_id', $leitor_id);
        $query->bindParam(':dataPrazo', $dataPrazo);
        $query->bindParam(':situacaoleitor', $situacaoleitor);
        $query->bindParam(':Livro_id', $Livro_id);

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

        $query = $Conexao->prepare('SELECT leitor_id, dataPrazo, situacaoleitor, livro_id FROM reserva');
        $query->execute();
        $reservas = $query->fetchAll(PDO::FETCH_CLASS);

        return $reservas;

    }

    public function deletar($id)
    {
        
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();
                
        $query = $Conexao->prepare('delete from reserva where id=:id');

        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($reserva)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $leitor_id = $reserva->getLeitor_id();
        $id = $reserva->getId();

        $query = $Conexao->prepare('update reserva set situacaoleitor=:situacaoleitor where id=:id');
        $query->bindParam(':situacaoleitor', $situacaoleitor);
        $query->bindParam(':id', $id);
        $query->execute();
        
    }

    public function get($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $query = $Conexao->prepare('SELECT id, leitor_id, situacaoleitor FROM reserva WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $reservas[0];

    }
}