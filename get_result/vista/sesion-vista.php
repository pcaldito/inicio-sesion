<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
        <link rel="stylesheet" href="../get_result/css/css.css">
    </head>
    <body>
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <form action="../get_result/controlador/sesion_controlador.php" method="post">
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Ingresar</button>
                </div>
            </form>
        </div>
    </body>
</html>