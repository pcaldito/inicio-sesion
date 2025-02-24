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

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if ($password == $row['pw']) { 
            $usuario_id = $row['idUsuario'];
            $usuario_nombre = urlencode($row['nombre']);
            
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
