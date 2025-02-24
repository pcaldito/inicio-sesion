<?php

    class Sesion_modelo {

        private $db;
        private $usuario;

        public function __construct() {
            require_once("modelo/conectar.php");
            $this->db = Conectar::conexion();
            $this->usuario = array();
        }

        public function iniciar_sesion($username, $password) {
            $stmt = $this->db->prepare("SELECT * FROM usuario WHERE nombre = :username AND pw = :password");
            $stmt->bindParam(':nombre', $username);
            $stmt->bindParam(':pw', $password);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $this->usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                return $this->usuario;
            } else {
                return false;
            }
        }
    }
?>