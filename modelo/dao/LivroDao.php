<?php
include 'utilidade/ConexaoBD.php';
class LivroDao
{

    public function salvar($livro)
    {
        //  try {

       $ConexaoBD = new ConexaoBD;
       $Conexao = $ConexaoBD->getConexao ();

        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $editora = $livro->getEditora();
        $id = $livro->getId();

        $query = $Conexao->prepare('INSERT INTO livro(titulo, autor_id, editora_id, area_id) VALUES (:titulo, :autor, :editora, :area');
        $query->bindParam(':titulo', $titulo);
        $query->bindParam(':autor', $autor);
        $query->bindParam(':editora', $editora);
        $query->bindParam(':area', $area);



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

        $query = $Conexao->prepare('SELECT id, titulo, autor_id, editora_id FROM livro');
        $query->execute();
        $livros = $query->fetchAll(PDO::FETCH_CLASS);

        return $livros;

    }

    public function deletar($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();
       
        $query = $Conexao->prepare('delete from livro where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($livro)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $editora = $livro->getEditora();
        $id = $livro->getId();

        $query = $Conexao->prepare('update livro set titulo=:titulo, autor=:autor, editora=:editora where id=:id');
        $query->bindParam(':titulo', $titulo);
        $query->bindParam(':id', $id);
        $query->bindParam(':autor', $autor);
        $query->bindParam(':editora', $editora);
        $query->execute();
        
    }

    public function get($id)
    {
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $query = $Conexao->prepare('SELECT titulo, autor_id, editora_id FROM livro WHERE id=:id');
        $query->bindParam(':id',$id);
        $query->execute();
        $livros = $query->fetchAll(PDO::FETCH_CLASS);

        return $livros[0];

    }

    public function buscar($filtro){
       
        $ConexaoBD = new ConexaoBD();
        $Conexao = $ConexaoBD->getConexaoBD();

        $filtro = "%".$filtro."%";

        $query = $Conexao->prepare('SELECT titulo, autor_id, editora_id FROM livro WHERE titulo  like :filtro');
        $query->bindParam(':filtro',$filtro);
        $query->execute();
        $livros = $query->fetchAll(PDO::FETCH_CLASS);

        return $livros;
    }
}
