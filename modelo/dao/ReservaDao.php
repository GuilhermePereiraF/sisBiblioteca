<?php
include 'utilidade/ConexaoBD.php';
class reservaDao
{

    public function salvar($reserva)
    {
        //  try {

            $ConexaoBD = new ConexaoBD();
            $Conexao = $ConexaoBD->getConexaoBD();

        $leitor = $reserva->geLeitor();
        $dataPrazo = $reserva->getDataPrazo();
        $situacao = $reserva-> getSituacao();
        $livro = $reserva->getLivro();
        $bibliotecario = $reserva->getiBibliotecario();

        $Conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $Conexao->prepare('INSERT INTO reserva(leitor, dataPrazo, situacao, livro, bibliotecario) VALUES (:leitor, :dataPrazo, :situacao, :livro, :bibliotecario)');
        $query->bindParam(':leitor', $leitor);
        $query->bindParam(':dataPrazo', $dataPrazo);
        $query->bindParam(':situacao', $situacao);
        $query->bindParam(':livro', $livro);
        $query->bindParam(':bibliotecario', $bibliotecario);


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

        $Conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $Conexao->prepare('SELECT leitor, dataPrazo, situacao, livro FROM reserva');
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

        $leitor = $reserva->getLeitor();
        $id = $reserva->getId();

        $query = $Conexao->prepare('update reserva set situacao=:situacao where id=:id');
        $query->bindParam(':situacao', $situacao);
        $query->bindParam(':id', $id);
        $query->execute();
        
    }

    public function get($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $query = $Conexao->prepare('SELECT id, leitor, situacao FROM reserva WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $reservas[0];

    }
}