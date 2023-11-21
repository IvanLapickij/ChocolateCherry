<!-- TABLE -->
<div class="mx-5 ">
<table class="table table-dark table-striped-columns border-primary">
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
</div>