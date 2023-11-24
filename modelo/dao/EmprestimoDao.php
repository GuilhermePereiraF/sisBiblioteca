<?php

class EmprestimoDao
{

    public function salvar($emprestimo)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "mydb";

        $leitor = $emprestimo->getLeitor();
        $retirada = $emprestimo->getRetirada();
        $prazoDevolucao = $emprestimo-> getPrazodevolucao();
        $dataDevolucao = $emprestimo->getDatadevolucao();
        $multa = $emprestimo->getMulta();
        $livro = $emprestimo->getLivro();
        $id = $emprestimo->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO emprestimo(leitor, retirada, prazodevolucao, datadevolucao, multa, livro) VALUES (:leitor, :retirada, :prazodevolucao, :datadevolucao, :multa, :livro)');
        $query->bindParam(':leitor', $leitor);
        $query->bindParam(':retirada', $retirada);
        $query->bindParam(':prazodevolucao', $prazoDevolucao);
        $query->bindParam(':datadevolucao', $dataDevolucao);
        $query->bindParam(':multa', $multa);
        $query->bindParam(':livro', $livro);



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
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT leitor, retirada, prazodevolucao, datadevolucao, multa, livro FROM emprestimo');
        $query->execute();
        $alunos = $query->fetchAll(PDO::FETCH_CLASS);

        return $emprestimos;

    }

    public function deletar($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from emprestimo where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($emprestimo)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $leitor = $emprestimo->getLeitor();
        $retirada = $emprestimo->getRetirada();
        $prazoDevolucao = $emprestimo->getPrazodevolucao();
        $dataDevolucao = $emprestimo->getDatadevolucao();
        $multa = $emprestimo->getMulta();
        $livro = $emprestimo->getLivro();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update emprestimo set leitor=:leitor, retirada=:retirada, prazodevolucao=:prazodevolucao, datadevolucao=:datadevolucao, multa=:multa, livro=:livro where id=:id');
        $query->bindParam(':leitor', $leitor);
        $query->bindParam(':retirada', $retirada);
        $query->bindParam(':prazodevolucao', $prazoDevolucao);
        $query->bindParam(':datadevolucao', $dataDevolucao);
        $query->bindParam(':multa', $multa);
        $query->bindParam(':livro', $livro);
        $query->execute();
        
    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT leitor, retirada, prazodevolucao, datadevolucao, multa, livro FROM emprestimo WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $emprestimos = $query->fetchAll(PDO::FETCH_CLASS);

        return $emprestimos[0];

    }

    public function buscar($filtro){
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "curso";

        $filtro = "%".$filtro."%";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT leitor, retirada, prazodevolucao, datadevolucao, multa, livro FROM emprestimo WHERE nome like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $emprestimos = $query->fetchAll(PDO::FETCH_CLASS);

        return $emprestimos;
    }
}
