<?php

require __DIR__ . '/../vendor/autoload.php';

use Faker\Factory;

function generateFakeData($pdo, $table, $count) {
    $faker = Factory::create();
    
    for ($i = 0; $i < $count; $i++) {
        $timestamps = generateTimestamps();
        
        $data = [
            'name' => $faker->name,
            'phone' => $faker->numerify('## 9 ####-####'),
            'email' => filter_var($faker->unique()->safeEmail, FILTER_VALIDATE_EMAIL),
            'created_at' => $timestamps['created_at'],
            'updated_at' => $timestamps['updated_at'],
        ];

        $sql = "INSERT INTO $table (name, phone, email, created_at, updated_at) VALUES (:name, :phone, :email, :created_at, :updated_at)";
        $stmt = $pdo->prepare($sql);
        
        try {
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Erro ao inserir dados: " . $e->getMessage();
        }
    }
}

function generateTimestamps() {
    $faker = Factory::create();
    $createdAt = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
    $updatedAt = $faker->dateTimeBetween($createdAt, 'now')->format('Y-m-d H:i:s');

    return [
        'created_at' => $createdAt,
        'updated_at' => $updatedAt,
    ];
}

?>