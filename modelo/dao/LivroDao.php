<?php
include 'utilidade/conexao.php';
class LivroDao
{

    public function salvar($livro)
    {
        //  try {

       $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $editora = $livro->getEditora();
        $id = $livro->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO livro(titulo, autor, editora, area) VALUES (:titulo, :autor, :editora, :area');
        $query->bindParam(':titulo', $titulo);
        $query->bindParam(':autor', $autor);
        $query->bindParam(':editora', $editora);
        $query->bindParam(':area', $area);



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

        $query = $conexao->prepare('SELECT id, titulo, autor_id, editora_id FROM livro');
        $query->execute();
        $livros = $query->fetchAll(PDO::FETCH_CLASS);

        return $livros;

    }

    public function deletar($id)
    {
       $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        
        $query = $conexao->prepare('delete from livro where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($livro)
    {
       $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $editora = $livro->getEditora();
        $id = $livro->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update livro set titulo=:titulo, autor=:autor, editora=:editora where id=:id');
        $query->bindParam(':titulo', $titulo);
        $query->bindParam(':id', $id);
        $query->bindParam(':autor', $autor);
        $query->bindParam(':editora', $editora);
        $query->execute();
        
    }

    public function get($id)
    {
       $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT titulo, autor,editora FROM livro WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $livros = $query->fetchAll(PDO::FETCH_CLASS);

        return $alunos[0];

    }

    public function buscar($filtro){
       
       $conexaoBD = new ConexaoBD;
        $conexao = configConexao->getConexao ();

        $filtro = "%".$filtro."%";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT titulo, autor_id, editora_id FROM livro WHERE titulo  like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $livros = $query->fetchAll(PDO::FETCH_CLASS);

        return $reservas;
    }
}
