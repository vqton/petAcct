<!-- Alert Container -->
<div id="alert-container" class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<script>
    // Function to create a new alert
    function createAlert(message, type = 'success') {
        const alertContainer = document.getElementById('alert-container');
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.role = 'alert';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        alertContainer.appendChild(alertDiv);

        // Auto-dismiss alert after 5 seconds
        setTimeout(() => {
            const alertInstance = new bootstrap.Alert(alertDiv);
            alertInstance.close();
        }, 5000);
    }

    // // Simulate a dynamic success alert
    // setTimeout(() => {
    //     createAlert('This is a dynamic success alert!', 'success');
    // }, 1000);

    // // Simulate a dynamic error alert
    // setTimeout(() => {
    //     createAlert('This is a dynamic error alert!', 'danger');
    // }, 3000);
</script>
