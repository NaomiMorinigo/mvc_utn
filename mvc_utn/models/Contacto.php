<?php
class Contacto
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function guardarMensaje($nombre, $email, $mensaje)
    {
        $query = "INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            // Mostrar el error de SQL si la preparación falla
            die("Error al preparar la consulta: " . $this->conn->error);
        }

        $stmt->bind_param("sss", $nombre, $email, $mensaje);
        return $stmt->execute();
    }
}
