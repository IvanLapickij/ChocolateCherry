
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