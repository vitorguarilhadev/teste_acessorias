<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/config.php';

$conn = conectar_banco_de_dados();

$registrosPorPagina = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$paginaAtual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($paginaAtual - 1) * $registrosPorPagina;

$stmt = $conn->prepare("SELECT * FROM clients LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $registrosPorPagina, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT COUNT(*) as total FROM clients");
$stmt->execute();
$totalRegistros = $stmt->fetchColumn();
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

require __DIR__ . '/../src/partials/header.php';

if ($resultados) {
    ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['id']); ?></td>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo htmlspecialchars($item['phone']); ?></td>
                    <td><?php echo htmlspecialchars($item['email']); ?></td>
                    <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                    <td><?php echo htmlspecialchars($item['updated_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
} else {
    echo '<p>No data found.</p>';
}

require __DIR__ . '/../src/partials/pagination.php';
renderPagination($paginaAtual, $totalPaginas);

require __DIR__ . '/../src/partials/footer.php';

?>
