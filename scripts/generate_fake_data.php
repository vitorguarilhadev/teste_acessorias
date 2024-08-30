<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/functions.php';

use Dotenv\Dotenv;
use Faker\Factory as Faker;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $faker = Faker::create();

    generateFakeData($pdo, 'clients', 120);

    echo "Dados gerados com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}

?>