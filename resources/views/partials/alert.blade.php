<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "hideDuration": "500",
        "showDuration": "300",
    };

    // Check for success message
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    // Check for error message
    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    // Check for validation errors
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
