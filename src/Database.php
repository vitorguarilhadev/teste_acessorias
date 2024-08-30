<?php

require __DIR__ . '/../config/config.php';

class Database {
    private $conn;

    public function __construct() {
        $this->conn = conectar_banco_de_dados();
    }

    public function getConnection() {
        return $this->conn;
    }

    public function createTables($sql) {
        try {
            $this->execute($sql);
            echo "Tabelas criadas com sucesso!" . "\n";
        } catch (PDOException $e) {
            echo "Erro ao criar as tabelas: " . $e->getMessage() . "\n";
            echo "SQL: " . $sql;
        }
    }

    public function execute($sql) {
        try {
            if (empty($sql)) {
                throw new Exception("SQL vazio fornecido.");
            }
            $this->conn->exec($sql);
        } catch(PDOException $e) {
            error_log("Erro ao executar SQL: " . $e->getMessage());
            throw $e;
        }
    }

    public function tableExists($tableName) {
        try {
            $result = $this->conn->query("SHOW TABLES LIKE '$tableName'");
            return $result->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Erro ao verificar a tabela: " . $e->getMessage();
            return false;
        }
    }

}

?>