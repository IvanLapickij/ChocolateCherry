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

<!-- Delete User ID Modal -->
<div class="modal fade" id="deleteUserInputModal" tabindex="-1" aria-labelledby="deleteUserInputModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserInputModalLabel">Enter User ID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="userIdInput" placeholder="Enter User ID">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="confirmUserId()">Confirm</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete User Confirmation Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="deleteConfirmation"></p>
                <form id="confirmDeleteUserForm" action="delete_user.php" method="post">
                    <input type="hidden" id="delete_user_id" name="delete_user_id">
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

