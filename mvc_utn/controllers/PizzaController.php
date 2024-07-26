<?php
require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '/../models/Pizza.php');
require_once(__DIR__ . '/../models/Pedido.php');

class PizzaController {
    private $db;
    private $pizzaModel;
    private $pedidoModel;

    public function __construct() {
        global $db;
        $this->pizzaModel = new Pizza($db);
        $this->pedidoModel = new Pedido($db);
    }

    public function inicio() {
        require_once(__DIR__ . '/../views/inicio.php');
    }

    public function menu() {
        $pizzas = $this->pizzaModel->obtenerTodos();
        if ($pizzas === false) {
            die("Error en la consulta a la base de datos: " . $this->db->error);
        }
        require_once(__DIR__ . '/../views/menu.php');
    }

    public function crearPedido() {
        $pizzaId = isset($_GET['pizza_id']) ? intval($_GET['pizza_id']) : 0;
        $pizza = $this->pizzaModel->obtenerPorId($pizzaId);

        if ($pizza === null) {
            die("Pizza no encontrada.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->pedidoModel->insertar($pizzaId);
            if ($result === false) {
                die("Error al crear el pedido: " . $this->db->error);
            }
            header("Location: index.php?action=pedidos_pendientes");
        } else {
            require_once(__DIR__ . '/../views/pedidos/crear_pedido.php');
        }
    }
}
?>
