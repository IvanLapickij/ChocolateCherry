<div class="row mx-5">
    <div class="col-md-6">
        <div class="card border-warning mb-3">
            <div class="card-header bg-dark text-white fs-4"> <!-- Increased text size -->
                Most Cheapest Chocolate Bar
            </div>
            <div class="card-body bg-dark">
                <h5 class="card-title text-white fs-4"><?php echo $cheapestBar['name']; ?></h5> <!-- Increased text size -->
                <p class="card-text text-white fs-4"> <!-- Increased text size -->
                    Price: <?php echo $cheapestBar['price']; ?>€ <br>
                    Chocolate Type: <?php echo $cheapestBar['chocolate_type']; ?> <br>
                    Taste: <?php echo $cheapestBar['taste']; ?> <br>
                    Sugar Percent: <?php echo $cheapestBar['sugar_percent']; ?>% <br>
                    Description: <?php echo $cheapestBar['description']; ?>
                </p>
            </div>
        </div>
    </div>
    <!-- most Expensive chocolate bar -->
    <div class="col-md-6">
        <div class="card border-warning mb-3">
            <div class="card-header bg-dark text-white fs-4"> <!-- Increased text size -->
                Most Expensive Chocolate Bar
            </div>
            <div class="card-body bg-dark">
                <h5 class="card-title text-white fs-4"><?php echo $mostExpensiveBar['name']; ?></h5> <!-- Increased text size -->
                <p class="card-text text-white fs-4"> <!-- Increased text size -->
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
