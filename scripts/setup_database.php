<?php

require __DIR__ . '/../src/functions.php';
require __DIR__ . '/../src/Database.php';

$db = new Database();
$tableExists = $db->tableExists('clients');

if (!$tableExists) {
    $sql = file_get_contents(__DIR__ . '/../sql/create_tables.sql');
    $db->createTables($sql);
    generateFakeData($db->getConnection(), 'clients', 120);
    echo "Banco de dados configurado e dados inseridos com sucesso.";
} else {
    echo "A tabela 'clients' já existe.";
}

?>