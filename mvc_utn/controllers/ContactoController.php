<?php
require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '/../models/Contacto.php');

class ContactoController
{
    private $db;
    private $contactoModel;

    public function __construct()
    {
        global $db;
        $this->contactoModel = new Contacto($db);
    }

    public function contacto() {
        require_once(__DIR__ . '/../views/contacto.php');
    }

    public function enviarContacto()
    {
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

        if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
            $result = $this->contactoModel->guardarMensaje($nombre, $email, $mensaje);
            if ($result) {
                header("Location: index.php?action=contacto&status=success");
            } else {
                header("Location: index.php?action=contacto&status=error");
            }
        } else {
            header("Location: index.php?action=contacto&status=error");
        }
        exit();
    }
}
