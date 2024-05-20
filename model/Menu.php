<?php
require_once 'Models\db.php';

class Menu {
    private $conn;

    public function __construct() {
        $this->conn = conn();
    }

    public function getAllItems() {
        $sql = "SELECT * FROM Menu";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addItem($item_name, $price) {
        $sql = "INSERT INTO Menu (item_name, price) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sd", $item_name, $price);
        return $stmt->execute();
    }

    public function deleteItem($id) {
        $sql = "DELETE FROM Menu WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getItemById($id) {
        $sql = "SELECT * FROM Menu WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateItem($id, $item_name, $price) {
        $sql = "UPDATE Menu SET item_name = ?, price = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdi", $item_name, $price, $id);
        return $stmt->execute();
    }
}
?>
