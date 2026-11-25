// Aplicacion CRUD desarrollada con GeminiIA 2611.12
// sitio web: htdocs/sistema_crud

<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'sistema_crud';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$mensaje = "";
$modo_edicion = false;
$usuario_editar = ['ID' => '', 'Nombre' => '', 'Correo' => ''];

// --- CREAR / ACTUALIZAR ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);

        if ($_POST['accion'] === 'crear') {
            if (!empty($nombre) && !empty($correo)) {
                $stmt = $pdo->prepare("INSERT INTO usuarios (Nombre, Correo) VALUES (?, ?)");
                try {
                    $stmt->execute([$nombre, $correo]);
                    $mensaje = "<div class='alert alert-success'>Registro guardado con éxito.</div>";
                } catch (PDOException $e) {
                    $mensaje = "<div class='alert alert-danger'>Error: El correo electrónico ya existe o es inválido.</div>";
                }
            }
        } elseif ($_POST['accion'] === 'actualizar') {
            $id = intval($_POST['id']);
            if (!empty($id) && !empty($nombre) && !empty($correo)) {
                $stmt = $pdo->prepare("UPDATE usuarios SET Nombre = ?, Correo = ? WHERE ID = ?");
                try {
                    $stmt->execute([$nombre, $correo, $id]);
                    $mensaje = "<div class='alert alert-success'>Registro actualizado con éxito.</div>";
                } catch (PDOException $e) {
                    $mensaje = "<div class='alert alert-danger'>Error al actualizar el registro.</div>";
                }
            }
        }
    }
}

// --- BORRAR ---
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE ID = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
    exit();
}

// --- PREPARAR EDICIÓN ---
if (isset($_GET['editar'])) {
    $id = intval($_GET['editar']);
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE ID = ?");
    $stmt->execute([$id]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($resultado) {
        $modo_edicion = true;
        $usuario_editar = $resultado;
    }
}

// --- CONSULTAR (LEER) ---
$stmt = $pdo->query("SELECT * FROM usuarios ORDER BY ID DESC");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP, MySQL y HTML</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Gestión de Usuarios (CRUD)</h1>
        
        <?= $mensaje ?>

        <div class="row">
            <!-- Formulario de Registro / Modificación -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><?= $modo_edicion ? 'Modificar Usuario' : 'Nuevo Usuario' ?></h5>
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <input type="hidden" name="accion" value="<?= $modo_edicion ? 'actualizar' : 'crear' ?>">
                            <?php if ($modo_edicion): ?>
                                <input type="hidden" name="id" value="<?= $usuario_editar['ID'] ?>">
                            <?php endif; ?>
                            
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario_editar['Nombre']) ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="<?= htmlspecialchars($usuario_editar['Correo']) ?>" required>
                            </div>
                            
                            <button type="submit" class="btn btn-<?= $modo_edicion ? 'warning' : 'success' ?> w-100">
                                <?= $modo_edicion ? 'Actualizar Registro' : 'Guardar Registro' ?>
                            </button>
                            <?php if ($modo_edicion): ?>
                                <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabla de Consulta -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Lista de Registros</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Correo Electrónico</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($usuarios) > 0): ?>
                                        <?php foreach ($usuarios as $user): ?>
                                            <tr>
                                                <td><?= $user['ID'] ?></td>
                                                <td><?= htmlspecialchars($user['Nombre']) ?></td>
                                                <td><?= htmlspecialchars($user['Correo']) ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?editar=<?= $user['ID'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                                    <a href="index.php?eliminar=<?= $user['ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Borrar</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">No hay registros guardados.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>