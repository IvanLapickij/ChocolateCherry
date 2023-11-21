<div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-light" id="offcanvasWithBothOptionsLabel">ADMIN DASHBOARD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php if ($isAdminLoggedIn) : ?>
            <?php if (isset($loggedInUsername)) : ?>
                <p id="greeting" class="text-light fs-4">Welcome, <?php echo $loggedInUsername; ?>!</p>
            <?php else : ?>
                <p id="greeting" class="text-light fs-4">Welcome, another day another chocolate!</p>
            <?php endif; ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logoutConfirmationModal">Logout</button>


            <h2 class="text-light">Admin Accounts</h2>
            <!-- Your admin buttons -->
            <button class="btn btn-success btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#createUserModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create</button>
            <button class="btn btn-warning btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#updateUserModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Update</button>
            <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#deleteUserInputModal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete</button>
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
                </tbody>
            </table>
        <?php else : ?>
            <p id="greeting" class="text-light">Welcome to the ADMIN menu, please log in for more options.</p>
            <form action="login_process.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </form>
        <?php endif; ?>
    </div>
</div>
