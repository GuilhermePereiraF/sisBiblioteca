<?php 
class ConexaoBD {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = 'aluno';
    private $bancoDados = 'mydb';
    private $conexaoBD;
    
        public function __construct() {
            $dsn = "mysql:host={$this->host};dbname={$this->bancoDados}";
    
            try {
                $this->conexaoBD = new PDO($dsn, $this->usuario, $this->senha);
                $this->conexaoBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Erro de conexão: ' . $e->getMessage();
            }
        }
    
        public function getConexaoBD() {
            return $this->conexaoBD;
        }
    }
    
    