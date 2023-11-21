<?php
require_once('connect.php');

function addBar() {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $chocolate_type = $_POST['chocolate_type'] ?? '';
    $taste = $_POST['taste'] ?? '';
    $sugar_percent = $_POST['sugar_percent'] ?? '';
    $description = $_POST['description'] ?? '';

    if (!empty($name) && !empty($price) && !empty($chocolate_type) && !empty($taste) && !empty($sugar_percent) && !empty($description)) {
        $query = "INSERT INTO cbtable (name, price, chocolate_type, taste, sugar_percent, description) 
                  VALUES ('$name', '$price', '$chocolate_type', '$taste', '$sugar_percent', '$description')";
        try {
            global $db;
            $db->exec($query);
            $id = $db->lastInsertId();
             // Redirect or perform other actions after successful update
        header("Location: index.php");
        exit;
            
        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'Please provide all required fields']);
    }
}

addBar();

?>
