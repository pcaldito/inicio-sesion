<?php
    require_once __DIR__ . "/../modelo/conectar.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if (empty($usuario) || empty($password)) {
            echo "Por favor, complete todos los campos.";
            exit();
        }

        $conexion = new Conectar();
        $conn = $conexion->conexion(); 

        $stmt = $conn->prepare("SELECT idUsuario, nombre, pw FROM usuario WHERE nombre = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();

        $stmt->bind_result($usuario_id, $usuario_nombre, $pw_guardado);

        if ($stmt->fetch()) { // Si hay un resultado
            if ($password === $pw_guardado) { 
                $usuario_nombre = urlencode($usuario_nombre);
                
                header("Location: ../vista/bienvenida.php?usuario_id=$usuario_id&usuario_nombre=$usuario_nombre");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Método de solicitud no válido.";
    }
?>
