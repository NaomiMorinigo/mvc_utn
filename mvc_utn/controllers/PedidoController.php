<?php
require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '/../models/Pedido.php');

class PedidoController
{
    private $db;
    private $pedidoModel;
    private $conn;

    public function __construct()
    {
        global $db;
        $this->pedidoModel = new Pedido($db);
    }

    public function mostrarGestion()
    {
        $pendientes = $this->pedidoModel->obtenerTodos('pendiente');
        $enProgreso = $this->pedidoModel->obtenerEnProceso();
        $completados = $this->pedidoModel->obtenerCompletados('completado');

        if ($pendientes === false || $enProgreso === false || $completados === false) {
            die("Error en la consulta a la base de datos: " . $this->db->error);
        }

        require_once(__DIR__ . '/../views/gestion.php');
    }

    public function pedidosPendientes()
    {
        $pendientes = $this->pedidoModel->obtenerTodos('pendiente');
        if ($pendientes === false) {
            die("Error en la consulta a la base de datos: " . $this->db->error);
        }
        require_once(__DIR__ . '/../views/pedidos/pedidos_pendientes.php');
    }

    public function pedidosEnProceso()
    {
        $pedidos = $this->pedidoModel->obtenerEnProceso('en_proceso');
        if ($pedidos === false) {
            die("Error en la consulta a la base de datos: " . $this->db->error);
        }
        require_once(__DIR__ . '/../views/pedidos/pedido_en_proceso.php');
    }

    public function pedidosCompletados()
    {
        $pedidos = $this->pedidoModel->obtenerCompletados('completado');
        if ($pedidos === false) {
            die("Error en la consulta a la base de datos: " . $this->db->error);
        }
        require_once(__DIR__ . '/../views/pedidos/pedidos_completados.php');
    }

    public function actualizarEstadoPedido()
    {
        $pedidoId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $nuevoEstado = isset($_GET['estado']) ? $_GET['estado'] : 'pendiente';
        $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : null;

        if ($pedidoId > 0) {
            $result = $this->pedidoModel->actualizarEstado($pedidoId, $nuevoEstado);
            if ($result === false) {
                die("Error al actualizar el estado del pedido: " . $this->db->error);
            }

            if ($redirect) {
                header("Location: index.php?action=" . $redirect);
            } else {
                if ($nuevoEstado === 'en_proceso') {
                    header("Location: index.php?action=pedidos_en_proceso");
                } elseif ($nuevoEstado === 'completado') {
                    header("Location: index.php?action=pedidos_completados");
                } else {
                    header("Location: index.php?action=pedidos_pendientes");
                }
            }
            exit();
        } else {
            die("ID de pedido no válido.");
        }
    }

    public function eliminarPedido()
    {
        $pedidoId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : null;

        if ($pedidoId > 0) {
            $result = $this->pedidoModel->eliminar($pedidoId);
            if ($result === false) {
                die("Error al eliminar el pedido: " . $this->db->error);
            }
        }

        if ($redirect) {
            header("Location: index.php?action=" . $redirect);
        } else {
            header("Location: index.php?action=pedidos_pendientes");
        }
        exit();
    }
}