<?php
require_once(__DIR__ . '/config/database.php');
require_once(__DIR__ . '/controllers/PedidoController.php');
require_once(__DIR__ . '/controllers/PizzaController.php');
require_once(__DIR__ . '/controllers/ContactoController.php');

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'pedidos_pendientes':
        $controller = new PedidoController();
        $controller->pedidosPendientes();
        break;
    case 'pedidos_en_proceso':
        $controller = new PedidoController();
        $controller->pedidosEnProceso();
        break;
    case 'pedidos_completados':
        $controller = new PedidoController();
        $controller->pedidosCompletados();
        break;
    case 'crear_pedido':
        $controller = new PizzaController();
        $controller->crearPedido();
        break;
    case 'actualizar_estado_pedido':
        $controller = new PEdidoController();
        $controller->actualizarEstadoPedido();
        break;
    case 'eliminar_pedido':
        $controller = new PedidoController();
        $controller->eliminarPedido();
        break;
    case 'mostrarGestion':
        $controller = new PedidoController();
        $controller->mostrarGestion();
        break;
    case 'inicio':
        $controller = new PizzaController();
        $controller->inicio();
        break;
    case 'menu':
        $controller = new PizzaController();
        $controller->menu();
        break;
    case 'contacto':
        $contactoController = new ContactoController();
        $contactoController->contacto();
        break;
    case 'enviar_contacto':
        $contactoController = new ContactoController();
        $contactoController->enviarContacto();
        break;

    default:
        require_once('views/404.php');
        break;
}
