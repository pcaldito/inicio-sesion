<?php
    class Conectar {
        private $host = "localhost";
        private $dbname = "sesiones";
        private $username = "root";
        private $password = "";
        private $conn;

        public function conexion() {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

            if ($this->conn->connect_error) {
                die("Error de conexión: " . $this->conn->connect_error);
            }

            return $this->conn;
        }
    }
?>
