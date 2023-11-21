<?php
require_once('connect.php');

if (isset($_POST['update_id'])) {
    $id = $_POST['update_id'];
    $name = $_POST['update_name'];
    $price = $_POST['update_price'];
    $chocolate_type = $_POST['update_chocolate_type'];
    $taste = $_POST['update_taste'];
    $sugar_percent = $_POST['update_sugar_percent'];
    $description = $_POST['update_description'];

    // Perform the update query
    $query = "UPDATE cbtable 
              SET name = :name, price = :price, chocolate_type = :chocolate_type, 
              taste = :taste, sugar_percent = :sugar_percent, description = :description 
              WHERE id = :id";

    try {
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':chocolate_type', $chocolate_type);
        $stmt->bindParam(':taste', $taste);
        $stmt->bindParam(':sugar_percent', $sugar_percent);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Redirect or perform other actions after successful update
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
