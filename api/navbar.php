<?php if ($isAdminLoggedIn) : ?>
    
        <button class="btn btn-success btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#createChocolateBarModal">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create
        </button>

        <button class="btn btn-warning btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#updateChocolateBarModal">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update
        </button>

        <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#deleteChocolateBarModal">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
        </button>
<?php endif; ?>
