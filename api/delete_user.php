<?php
require_once('connect.php');

function deleteUser() {
    // Ensure the form data is posted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Access the form data
        $userId = $_POST['delete_user_id'] ?? '';

        // Validate inputs, make sure the user ID is not empty
        if (!empty($userId)) {
            // Delete user from the database
            $query = "DELETE FROM users WHERE id = $userId";
            try {
                global $db;
                $db->exec($query);
                // Redirect or perform other actions after successful user deletion
                header("Location: index.php");
                exit;
            } catch (PDOException $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
        } else {
            echo json_encode(['error' => 'Please provide a user ID to delete.']);
        }
    }
}

deleteUser();
?>
