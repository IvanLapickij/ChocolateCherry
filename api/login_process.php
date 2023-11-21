<?php
session_start();
require_once('connect.php'); // Contains the database connection setup

if (isset($_POST['username'], $_POST['password'])) {
    // Get the user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user details from the database
    $query = $db->prepare("SELECT * FROM users WHERE uLogin = :uLogin");
    $query->execute(array(':uLogin' => $username));
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // User exists, verify the password
        $hashed_password = $user['uPass']; // Assuming stored password is hashed

        // Validate the password for login (use password_verify in actual login flow)
        if ($password === $hashed_password) {
            // Login successful
            $_SESSION['user'] = $username;
            echo "Login successful for username: " . $user['uLogin'];
            header("Location: index.php");
            exit; // Ensure to exit after header redirection
        } else {
            // Login failed - Incorrect password
            echo "Login failed. Incorrect password. Please try again.";
        }
    } else {
        // Login failed - User not found
        echo "Login failed. User not found. Please try again.";
    }
} else {
    echo "Username and password not provided. Please enter your credentials.";
}
?>
