<?php
class Pizza {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM pizzas";
        $result = $this->conn->query($query);
        return $result;
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM pizzas WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
