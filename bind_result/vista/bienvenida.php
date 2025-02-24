<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <h2>Sesión Iniciada Correctamente</h2>

        <?php
            $usuario = isset($_GET['usuario_id']) ? htmlspecialchars($_GET['usuario_id']) : 'Desconocido';
            $nombre = isset($_GET['usuario_nombre']) ? htmlspecialchars($_GET['usuario_nombre']) : 'Desconocido';
        ?>
        
        <p>Usuario ID: <?php echo $usuario; ?></p>
        <p>Nombre: <?php echo $nombre; ?></p>
        
        <a href="sesion-vista.php">Volver al inicio de sesión</a>
    </body>
</html>
