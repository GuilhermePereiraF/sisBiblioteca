<?php
require_once 'utilidade/ConexaoBD.php';
class EmprestimoDao
{

    public function salvar($emprestimo)
    {
        //  try {

            $ConexaoBD = new ConexaoBD();
            $Conexao = $ConexaoBD->getConexaoBD();

        $leitor = $emprestimo->getLeitor();
     
        $prazo_Devolucao = $emprestimo-> getPrazo_devolucao();
        $data_Devolucao = $emprestimo->getData_devolucao();
        $multa = $emprestimo->getMulta();
        $livro = $emprestimo->getLivro();
        $id = $emprestimo->getId();

        $Conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $Conexao->prepare('INSERT INTO emprestimo(leitor, retirada, prazo_devolucao, data_devolucao, multa, Livro_id) VALUES (:leitor, :retirada, :prazodevolucao, :datadevolucao, :multa, :Livro_id)');
        $query->bindParam(':leitor', $leitor);
        $query->bindParam(':retirada', $retirada);
        $query->bindParam(':prazo_devolucao', $prazo_Devolucao);
        $query->bindParam(':data_devolucao', $data_Devolucao);
        $query->bindParam(':multa', $multa);
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

        $query = $Conexao->prepare('SELECT leitor_id, retirada, prazo_devolucao, data_devolucao, multa, Livro_id FROM emprestimo');
        $query->execute();
        $emprestimo = $query->fetchAll(PDO::FETCH_CLASS);

        return $emprestimos;

    }

    public function deletar($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();
        
        $query = $Conexao->prepare('delete from emprestimo where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($emprestimo)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $leitor = $emprestimo->getLeitor();
        $retirada = $emprestimo->getRetirada();
        $prazo_Devolucao = $emprestimo->getPrazo_devolucao();
        $data_Devolucao = $emprestimo->getData_devolucao();
        $multa = $emprestimo->getMulta();
        $livro = $emprestimo->getLivro();

        
        $query = $Conexao->prepare('update emprestimo set leitor=:leitor, retirada=:retirada, prazodevolucao=:prazodevolucao, datadevolucao=:datadevolucao, multa=:multa, livro=:livro where id=:id');
        $query->bindParam(':leitor', $leitor);
        $query->bindParam(':retirada', $retirada);
        $query->bindParam(':prazo_devolucao', $prazo_Devolucao);
        $query->bindParam(':data_devolucao', $data_Devolucao);
        $query->bindParam(':multa', $multa);
        $query->bindParam(':livro', $livro);
        $query->execute();
        
    }

    public function get($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $query = $Conexao->prepare('SELECT leitor_id, retirada, prazo_devolucao, data_devolucao, multa, livro_id  FROM emprestimo WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $emprestimos = $query->fetchAll(PDO::FETCH_CLASS);

        return $emprestimos[0];

    }

    public function buscar($filtro){
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $filtro = "%".$filtro."%";

        $query = $Conexao->prepare('SELECT leitor_id, retirada, prazo_devolucao, data_devolucao, multa, livro_id FROM emprestimo WHERE nome like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $emprestimos = $query->fetchAll(PDO::FETCH_CLASS);

        return $emprestimos;
    }
}
