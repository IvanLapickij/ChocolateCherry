<script>
   function confirmLogout() {
    // Assuming 'confirm' logic here, you can customize as needed
    if (confirm("Are you sure you want to log out?")) {
        // Get the form element
        var form = document.getElementById("logoutConfirmationModal");
        // Set the form action to the logout URL
        form.action = "index.php"; // Replace "logout.php" with your logout URL
        // Submit the form
        form.submit();
    }
}

    
    
    
        setTimeout(function () {
        var title = document.getElementById('title');
        var content = document.getElementById('content');

        title.classList.remove('fade-out');
        title.classList.add('fade-in');

        setTimeout(function () {
            title.style.display = 'none'; // Hide the title after fading out
            content.classList.remove('d-none'); // Show the content after the fade-in effect
        }, 2000); // Hide the title and show content after 3 seconds
    },1000); // Trigger the fade-in effect after 3 seconds

let userId = "";

    function toggleDeleteUserInput() {
        const deleteInput = document.getElementById('deleteInput');
        deleteInput.classList.toggle('d-none');
    }

    function confirmUserId() {
        userId = document.getElementById('userIdInput').value;
        document.getElementById('delete_user_id').value = userId;

        // Set the confirmation message in the modal
        document.getElementById('deleteConfirmation').innerText = `Are you sure you want to delete user with ID: ${userId}?`;

        // Show the modal
        const deleteUserModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
        deleteUserModal.show();

        // Hide the input after confirmation
        document.getElementById('deleteInput').classList.add('d-none');
    }
</script>