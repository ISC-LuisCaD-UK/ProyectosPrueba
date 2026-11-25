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

$mensaje = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');

    if ($nombre === '' || $telefono === '') {
        $error = 'Por favor completa tanto el nombre como el teléfono.';
    } else {
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
            $sql = 'INSERT INTO tablasimple (nombre, telefono) VALUES (:nombre, :telefono)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombre'   => $nombre,
                ':telefono' => $telefono,
            ]);
            $mensaje = 'Registro guardado correctamente en tablasimple.';
        } catch (PDOException $e) {
            $error = 'Error al guardar en la base de datos: ' . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo PHP + MariaDB</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 460px; margin: 40px auto; padding: 0 16px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input[type="text"], input[type="tel"] { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        .acciones { display: flex; gap: 10px; margin-top: 16px; align-items: center; }
        button { padding: 10px 16px; cursor: pointer; }
        .btn-lista { display: inline-block; padding: 10px 16px; background-color: #0d6efd; color: #fff; text-decoration: none; border-radius: 4px; }
        .btn-lista:hover { background-color: #0b5ed7; }
        .ok { color: #155724; background: #d4edda; padding: 10px; margin-top: 14px; border-radius: 4px; }
        .err { color: #721c24; background: #f8d7da; padding: 10px; margin-top: 14px; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Registro simple</h2>

    <?php if ($mensaje !== ''): ?>
        <div class="ok"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <?php if ($error !== ''): ?>
        <div class="err"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required maxlength="100">

        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" required maxlength="30">

        <div class="acciones">
            <button type="submit">Guardar</button>
            <a class="btn-lista" href="registros.php" target="_blank" rel="noopener noreferrer">Ver registros</a>
        </div>
    </form>
</body>
</html>