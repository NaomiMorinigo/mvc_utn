<?php
class Pedido
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function obtenerTodos($estado = null)
    {
        $query = "SELECT pedidos.id, pizzas.tipo AS producto, pedidos.estado
                  FROM pedidos
                  JOIN pizzas ON pedidos.pizza_id = pizzas.id";
        if ($estado !== null) {
            $query .= " WHERE pedidos.estado = '$estado'";
        }
        $result = $this->conn->query($query);
        return $result;
    }

    public function insertar($pizzaId)
    {
        $query = "INSERT INTO pedidos (pizza_id, estado) VALUES (?, 'pendiente')";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $pizzaId);
        $result = $stmt->execute();
        return $result;
    }

    public function obtenerPendientes()
    {
        $query = "SELECT * FROM pedidos WHERE estado = 'pendiente'";
        $result = $this->conn->query($query);
        $pedidos = [];
        while ($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }
        return $pedidos;
    }

    public function obtenerEnProceso()
    {
        $query = "SELECT p.id, pi.tipo AS producto, pi.precio FROM pedidos p JOIN pizzas pi ON p.pizza_id = pi.id WHERE p.estado = 'en_proceso'";
        return $this->conn->query($query);
    }

    public function obtenerCompletados()
    {
        $query = "SELECT p.id, pi.tipo AS producto, pi.precio FROM pedidos p JOIN pizzas pi ON p.pizza_id = pi.id WHERE p.estado = 'completado'";
        return $this->conn->query($query);
    }

    public function eliminar($id)
    {
        $query = "DELETE FROM pedidos WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function actualizarEstado($id, $estado)
    {
        $query = "UPDATE pedidos SET estado = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $estado, $id);
        return $stmt->execute();
    }
}

