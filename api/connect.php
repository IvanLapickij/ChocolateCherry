<?php
    $dsn = 'mysql:host=127.0.0.1:3307;dbname=cbdatabase';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        //include('database_error.php');
		echo 'DB error';
        exit();
    }
?>