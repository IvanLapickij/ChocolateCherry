<?php
require_once('connect.php');

function updateUser() {
    // Ensure the form data is posted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Access the form data
        $userId = $_POST['user_id'] ?? '';
        $newUsername = $_POST['new_username'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';

        // Validate inputs, make sure the fields are not empty
        if (!empty($userId) && !empty($newUsername) && !empty($newPassword)) {
            // Hash the new password for security (You should use a more secure method like password_hash)
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update user in the database
            $query = "UPDATE users SET uLogin = '$newUsername', uPass = '$hashedNewPassword' WHERE id = $userId";
            try {
                global $db;
                $db->exec($query);
                // Redirect or perform other actions after successful user update
                header("Location: index.php");
                exit;
            } catch (PDOException $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
        } else {
            echo json_encode(['error' => 'Please provide a user ID, new username, and password.']);
        }
    }
}

updateUser();
?>
