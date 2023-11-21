<?php
require_once('connect.php');

function deleteBar($id) {
    $query = "DELETE FROM cbtable WHERE id = :id";
    try {
        global $db;
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        // You might want to perform additional error handling or success messages here
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    deleteBar($id);
    // Perform any necessary redirection or further actions after deletion
    header("Location: index.php");
    exit;
}
?>
