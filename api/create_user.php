<?php
require_once('connect.php');

function addUser() {
    // Ensure the form data is posted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Access the form data
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validate inputs, make sure the fields are not empty
        if (!empty($username) && !empty($password)) {
            // Hash the password for security (You should use a more secure method like password_hash)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into the database
            $query = "INSERT INTO users (uLogin, uPass) VALUES ('$username', '$hashedPassword')";
            try {
                global $db;
                $db->exec($query);
                // Redirect or perform other actions after successful user creation
                header("Location: index.php");
                exit;
            } catch (PDOException $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
        } else {
            echo json_encode(['error' => 'Please provide a username and password.']);
        }
    }
}
// After the user is successfully created
$_SESSION['message'] = "User created successfully";
addUser();
?>
