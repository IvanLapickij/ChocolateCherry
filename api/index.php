<?php
session_start();
// Database connection
require_once('connect.php');

// Authentication check
$isAdminLoggedIn = isset($_SESSION['user']);

// ... (other authentication mechanisms, queries, CRUD operations, and data retrieval)


// Check if the 'logout' parameter is present in the POST request
if (isset($_POST['logout'])) {
    // Unset or remove the 'user' session data to log the user out
    unset($_SESSION['user']);
    // Redirect the user to the index page after logout
    header("Location: index.php");
    // Terminate script execution to prevent further code execution
    exit;
}

//MySQL QUERIES

$query = 'SELECT * FROM cbtable';
$bars = $db->query($query);
$query = 'SELECT * FROM users';
$users = $db->query($query);

// Retrieve the count of each chocolate type
$query = 'SELECT chocolate_type, COUNT(*) AS type_count FROM cbtable GROUP BY chocolate_type';
$chocolateTypes = $db->query($query);

// Calculate the total count of all chocolate types
$totalCount = 0;
foreach ($chocolateTypes as $type) {
    $totalCount += $type['type_count'];
}
// Calculate the average sugar percentage
$query = 'SELECT AVG(sugar_percent) AS average_sugar_percent FROM cbtable';
$averageSugarResult = $db->query($query);
$averageSugarRow = $averageSugarResult->fetch();
$averageSugar = number_format($averageSugarRow['average_sugar_percent'], 2); // Format to two decimal places

// Retrieve the cheapest chocolate bar
$query = 'SELECT * FROM cbtable ORDER BY price ASC LIMIT 1';
$cheapestBarResult = $db->query($query);
$cheapestBar = $cheapestBarResult->fetch();

// Retrieve the most expensive chocolate bar
$query = 'SELECT * FROM cbtable ORDER BY price DESC LIMIT 1';
$mostExpensiveBarResult = $db->query($query);
$mostExpensiveBar = $mostExpensiveBarResult->fetch();
// Functions for CRUD operations and data retrieval

// HTML structure and presentation
?>

<HTML>
<HEAD>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Link to your CSS file -->
    <!--glyphicons-->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!--bootstrap--> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <TITLE>Chocolate Bars</TITLE>
</HEAD>
<BODY>
    <!--bootstrap script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
<h2 id="title" class="text-danger p-2 border border-dark border-5 rounded" style="background-color: transparent; font-size: 8em; text-align: center; display: flex; align-items: center; justify-content: center;">
    Cherry <span style="font-size: 2em;">🍒</span> Chocolate
</h2>





    <div id="content" class="d-none" style="margin-top: 150px;">




    
    <!-- Navbar/Header -->
            <!-- SIDE BAR TOGGLE -->
      <div class="mx-5">  <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Admin Dashboard</button>

    <?php include 'navbar.php'; ?>
      </div>
    <!-- Modals for CRUD operations -->
    <!--USERS-->
    <?php include 'userModals.php'; ?>
    <!--CHOCOLATE BARS-->
    <?php include 'chocolate_bar_modals.php'; ?>

    <!-- Admin Dashboard -->
    <?php include 'admin_dashboard.php'; ?>

    <!-- Table to display chocolate bars -->
    <?php include 'chocolate_bar_table.php'; ?>

    <!-- Cards for cheapest and most expensive chocolate bars -->
    <?php include 'chocolate_bar_cards.php'; ?>
    <!-- Progress bar for average sugar percentage -->
    <?php include 'progress_bars.php'; ?>

    <!-- Logout Confirmation Modal -->
    <?php include 'logout_confirmation_modal.php'; ?>

  
    
        </div>
</div>
  <!-- Scripts -->
    <?php include 'scripts.php'; ?>
</BODY>
</HTML>
