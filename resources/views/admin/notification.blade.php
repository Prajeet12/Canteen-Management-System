 @php
            $alertType = \Session::has('success') ? 'alert-success' : (\Session::has('deleted') ? 'alert-danger' : '');
        @endphp

        @if (\Session::has('success') || \Session::has('deleted'))
            <div class="alert alert-dismissible fade show rounded-3 position-fixed top-0 end-0 m-4 {{ $alertType }}"
                role="alert" style="width: 30%; height: 15%;" id="autoDismissAlert">
                <div class="d-flex align-items-center justify-content-left h-100">
                    @if (\Session::has('success'))
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>
                            <strong>Success!</strong>
                            <p class="mb-0">{{ \Session::get('success') }}</p>
                        </div>
                    @elseif (\Session::has('deleted'))
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div>
                            <strong>Deleted!</strong>
                            <p class="mb-0">{{ \Session::get('deleted') }}</p>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                // Automatically remove the alert after 3 seconds
                setTimeout(function() {
                    document.getElementById('autoDismissAlert').remove();
                }, 2000);
            </script>
        @endif