<?php
include 'utilidade/conexao.php';
class reservaDao
{

    public function salvar($reserva)
    {
        //  try {

       $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $leitor = $reserva->geLeitor();
        $dataPrazo = $reserva->getDataPrazo();
        $situacao = $reserva-> getSituacao();
        $livro = $reserva->getLivro();
        $bibliotecario = $reserva->getiBibliotecario();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO reserva(leitor, dataPrazo, situacao, livro, bibliotecario) VALUES (:leitor, :dataPrazo, :situacao, :livro, :bibliotecario)');
        $query->bindParam(':leitor', $leitor);
        $query->bindParam(':dataPrazo', $dataPrazo);
        $query->bindParam(':situacao', $situacao);
        $query->bindParam(':livro', $livro);
        $query->bindParam(':bibliotecario', $bibliotecario);


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

        $query = $conexao->prepare('SELECT leitor, dataPrazo, situacao, livro FROM reserva');
        $query->execute();
        $reservas = $query->fetchAll(PDO::FETCH_CLASS);

        return $reservas;

    }

    public function deletar($id)
    {
        
       $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        
        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from reserva where id=:id');

        $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from reserva where id=:id');

        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($reserva)
    {
       $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $leitor = $reserva->getLeitor();
        $id = $reserva->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update reserva set situacao=:situacao where id=:id');
        $query->bindParam(':situacao', $situacao);
        $query->bindParam(':id', $id);
        $query->execute();
        
    }

    public function get($id)
    {
       $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, leitor, situacao FROM reserva WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $reservas[0];

    }
}