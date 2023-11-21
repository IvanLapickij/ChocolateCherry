<?php
session_start();

// Replace this with your authentication mechanism
$isAdminLoggedIn = isset($_SESSION['user']); // Update this check based on your login logic

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    header("Location: index.php");
    exit;
}

require_once('connect.php');

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
?>

<HTML>
<HEAD>
    
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <TITLE>Car Details</TITLE>
</HEAD>
<BODY>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <h2>Chocolate Bar Shop</h2>

    <?php if ($isAdminLoggedIn) : ?>
<button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#createChocolateBarModal">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create
</button>

<button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#updateChocolateBarModal">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update
</button>

<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteChocolateBarModal">
    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
</button>
        
        
    <?php endif; ?>
    <!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="create_user.php" method="post">
                    <label for="newUsername">Username:</label>
                    <input type="text" id="newUsername" name="username"><br>
                    
                    <label for="newPassword">Password:</label>
                    <input type="password" id="newPassword" name="password"><br>
                    
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
<!-- Update User Modal -->
<div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalLabel">Update User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update_user.php" method="post">
                    <label for="user_id">ID of the user to update:</label>
                    <input type="text" id="user_id" name="user_id"><br>

                    <!-- Your input fields for updating the user -->
                    <label for="new_username">New Username:</label>
                    <input type="text" id="new_username" name="new_username"><br>
                    
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password"><br>
                    
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="delete_user.php" method="post">
                    <label for="delete_user_id">ID of the user to delete:</label>
                    <input type="text" id="delete_user_id" name="delete_user_id"><br>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!--SIDE BAR TOOGLE-->
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Admin Dashboard</button>

<!-- Create Chocolate Bar Modal -->
<div class="modal fade" id="createChocolateBarModal" tabindex="-1" aria-labelledby="createChocolateBarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createChocolateBarModalLabel">Create New Chocolate Bar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="create_chocolate_bar.php" method="post">
                    <!-- Your input fields for creating a new chocolate bar -->
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"><br>
                    
                    <label for="name">Price:</label>
                    <input type="text" id="price" name="price"><br>
                    
                    <label for="name">Type:</label>
                    <input type="text" id="chocolate_type" name="chocolate_type"><br>
                    
                    <label for="name">Taste:</label>
                    <input type="text" id="taste" name="taste"><br>
                    
                    <label for="name">Sugar %</label>
                    <input type="text" id="sugar_percent" name="sugar_percent"><br>
                    
                    <label for="name">Description</label>
                    <input type="text" id="description" name="description"><br>
                    
                    <button type="submit" class="btn btn-primary">Add Chocolate Bar</button>
                </form>
            </div>
            
            
        </div>
    </div>
</div>
<!-- Update Chocolate Bar Modal -->
<div class="modal fade" id="updateChocolateBarModal" tabindex="-1" aria-labelledby="updateChocolateBarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateChocolateBarModalLabel">Update Chocolate Bar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update_chocolate_bar.php" method="post">
                    <label for="update_id">ID of the bar to update:</label>
                    <input type="text" id="update_id" name="update_id"><br>

                    <!-- Your input fields for updating the chocolate bar -->
                    <label for="update_name">Name:</label>
                    <input type="text" id="update_name" name="update_name"><br>
                    
                    <label for="update_price">Price:</label>
                    <input type="text" id="update_price" name="update_price"><br>
                    
                    <label for="update_chocolate_type">Type:</label>
                    <input type="text" id="update_chocolate_type" name="update_chocolate_type"><br>
                    
                    <label for="update_taste">Taste:</label>
                    <input type="text" id="update_taste" name="update_taste"><br>
                    
                    <label for="update_sugar_percent">Sugar %</label>
                    <input type="text" id="update_sugar_percent" name="update_sugar_percent"><br>
                    
                    <label for="update_description">Description</label>
                    <input type="text" id="update_description" name="update_description"><br>
                    
                    <button type="submit" class="btn btn-primary">Update Chocolate Bar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Chocolate Bar Modal -->
<div class="modal fade" id="deleteChocolateBarModal" tabindex="-1" aria-labelledby="deleteChocolateBarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteChocolateBarModalLabel">Delete Chocolate Bar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteChocolateForm" action="delete_chocolate_bar.php" method="post">
                    <label for="delete_id">ID of the bar to delete:</label>
                    <input type="text" id="delete_id" name="delete_id"><br>
                    <button type="submit" class="btn btn-danger">Delete Chocolate Bar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">ADMIN DASHBOARD</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Welcome to ADMIN menu , please log in for more options.</p>
    
    <!-- Toggle button for admin dashboard -->
    <?php if ($isAdminLoggedIn) : ?>
        <form id="confirmLogoutForm" method="post" action="">
            <input type="submit" name="logout" value="Logout">
        </form>
        <a href="dashboard.php">Go to Dashboard</a>
        
    <?php else : ?>
         <form action="login_process.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
        <a href="login.php">Admin Login</a>
    <?php endif; ?>
        <?php if ($isAdminLoggedIn) : ?>
    <h2>Admin Accounts</h2>
    
<button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#createUserModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create</button>

<button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#updateUserModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Update</button>

<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteUSerModal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete</button>
    <!-- Your admin table -->
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
   
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['uLogin']; ?></td>
            <td><?php echo $user['uPass']; ?></td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>

        </tbody>
    </table>
    
  </div>
</div>
    
    
    
    
    
    

    <!-- TABLE -->
    <table class="table table-dark table-striped-columns table-bordered border-primary">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Chocolate Type</th>
            <th>Taste</th>
            <th>Sugar Percent</th>
            <th>Description</th>
        </tr>
        <?php foreach ($bars as $bar) : ?>
            <tr>
                <td style="text-align: center;"><?php echo $bar['id']; ?></td>
                <td style="text-align: center;"><?php echo $bar['name']; ?></td>
                <td style="text-align: center;"><?php echo $bar['price']; ?>€</td>
                <td style="text-align: center;"><?php echo $bar['chocolate_type']; ?></td>
                <td style="text-align: center;"><?php echo $bar['taste']; ?></td>
                <td style="text-align: center;"><?php echo $bar['sugar_percent']; ?>%</td>
                <td style="text-align: center;"><?php echo $bar['description']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
   
<!--the Cheapest chocolate bar-->    
<div class="row">
    <div class="col-md-6">
        <div class="card border-light mb-3">
            <div class="card-header bg-light text-white">
                Most Cheapest Chocolate Bar
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $cheapestBar['name']; ?></h5>
                <p class="card-text">
                    Price: <?php echo $cheapestBar['price']; ?>€ <br>
                    Chocolate Type: <?php echo $cheapestBar['chocolate_type']; ?> <br>
                    Taste: <?php echo $cheapestBar['taste']; ?> <br>
                    Sugar Percent: <?php echo $cheapestBar['sugar_percent']; ?>% <br>
                    Description: <?php echo $cheapestBar['description']; ?>
                </p>
            </div>
        </div>
    </div>
 <!--most Expensive chocolate bar-->
    <div class="col-md-6">
        <div class="card border-warning mb-3">
            <div class="card-header bg-warning text-white">
                Most Expensive Chocolate Bar
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $mostExpensiveBar['name']; ?></h5>
                <p class="card-text">
                    Price: <?php echo $mostExpensiveBar['price']; ?>€ <br>
                    Chocolate Type: <?php echo $mostExpensiveBar['chocolate_type']; ?> <br>
                    Taste: <?php echo $mostExpensiveBar['taste']; ?> <br>
                    Sugar Percent: <?php echo $mostExpensiveBar['sugar_percent']; ?>% <br>
                    Description: <?php echo $mostExpensiveBar['description']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
<h2>Sugar Average in Chocolate Bars</h2><br>
<div class="progress" style="height: 30px;">
    <div class="progress-bar" role="progressbar" style="width: <?php echo $averageSugar; ?>%; min-width: 20%;" aria-valuenow="<?php echo $averageSugar; ?>" aria-valuemin="0" aria-valuemax="100">
        <span style="font-size: 20px;"><?php echo $averageSugar; ?>%</span>
    </div>
</div>

<h2>Popularity of Chocolate Types</h2>

<?php
// Retrieve the count of each chocolate type
$query = 'SELECT chocolate_type, COUNT(*) AS type_count FROM cbtable GROUP BY chocolate_type';
$chocolateTypes = $db->query($query);

// Calculate the total count of all chocolate types
$totalCount = 0;
$popularityData = [];

foreach ($chocolateTypes as $type) {
    $totalCount += $type['type_count'];
    $popularityData[$type['chocolate_type']] = $type['type_count'];
}

// Display the popularity of chocolate types
foreach ($popularityData as $chocolateType => $count) {
    $percentage = ($count / $totalCount) * 100;
    ?>

    <div class="progress" style="height: 30px; margin-bottom: 10px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage; ?>%; min-width: 20%;" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100">
            <span style="font-size: 16px;"><?php echo $chocolateType; ?> - <?php echo round($percentage, 2); ?>%</span>
        </div>
    </div>




<?php } ?>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutConfirmationModal" tabindex="-1" aria-labelledby="logoutConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutConfirmationModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="logoutForm" method="post" action="">
                    <input type="hidden" name="logout" value="true">
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle form submission for logout
    document.getElementById('confirmLogoutForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        // Trigger the modal when the form is submitted
        $('#logoutConfirmationModal').modal('show');
    });
</script>

</BODY>
</HTML>
