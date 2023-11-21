
<h2 class="text-white mx-5 bg-dark" >Sugar Average in Chocolate Bars</h2>
<div class="progress bg-dark  mx-5" style="height: 30px;">
    <div class="progress-bar" role="progressbar" style="width: <?php echo $averageSugar; ?>%; min-width: 20%;" aria-valuenow="<?php echo $averageSugar; ?>" aria-valuemin="0" aria-valuemax="100">
        <span style="font-size: 20px;"><?php echo $averageSugar; ?>%</span>
    </div>
</div>
<br>
<br>
<h2 class="text-white mx-5 bg-dark">Popularity of Chocolate Types</h2>

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

    <div class="progress bg-dark  mx-5" style="height: 30px; margin-bottom: 10px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage; ?>%; min-width: 20%;" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100">
            <span style="font-size: 16px;"><?php echo $chocolateType; ?> - <?php echo round($percentage, 2); ?>%</span>
        </div>
    </div>


<?php } ?>
