<?php
$host = '127.0.0.1';
$db   = 'pruebasimple';
$user = 'root';
$pass = ''; // Cambia esto si tu MariaDB tiene contraseña
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$error = '';
$registros = [];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $sqlSelect = 'SELECT id, nombre, telefono, creado_en FROM tablasimple ORDER BY id DESC';
    $stmtSelect = $pdo->query($sqlSelect);
    $registros = $stmtSelect->fetchAll();
} catch (PDOException $e) {
    $error = 'Error de base de datos: ' . htmlspecialchars($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros guardados - Demo PHP + MariaDB</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 720px; margin: 40px auto; padding: 0 16px; }
        .barra-superior { display: flex; justify-content: space-between; align-items: center; gap: 12px; }
        .btn-actualizar { padding: 8px 14px; cursor: pointer; }
        .err { color: #721c24; background: #f8d7da; padding: 10px; margin-top: 14px; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <div class="barra-superior">
        <h2>Registros guardados</h2>
        <button class="btn-actualizar" type="button" onclick="window.location.reload();">Actualizar lista</button>
    </div>

    <?php if ($error !== ''): ?>
        <div class="err"><?= $error ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Creado en</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($registros)): ?>
                <tr>
                    <td colspan="4">No hay registros todavía.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($registros as $fila): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) $fila['id']) ?></td>
                        <td><?= htmlspecialchars($fila['nombre']) ?></td>
                        <td><?= htmlspecialchars($fila['telefono']) ?></td>
                        <td><?= htmlspecialchars($fila['creado_en']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>