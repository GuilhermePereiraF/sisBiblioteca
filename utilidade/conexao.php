<?php 
class ConexaoBD {
    private $host = 'localhost';
    private $usuario = 'mysql';
    private $senha = 'aluno';
    private $bancoDados = 'sisBiblioteca';
    private $conexao;
    
        public function __construct() {
            $dsn = "mysql:host={$this->host};dbname={$this->bancoDados}";
    
            try {
                $this->conexao = new PDO($dsn, $this->usuario, $this->senha);
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Erro de conexão: ' . $e->getMessage();
            }
        }
    
        public function getConexao() {
            return $this->conexao;
    
    $conexaoBD = new ConexaoBD();
    $conexao = $conexaoBD->getConexao();
    
        }
    }
    
    