@if (session('success'))
    <div id="myAlert" class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif

@if (session('error'))
    <div id="myAlert" class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif

@if (session('warning'))
    <div id="myAlert" class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('warning') }}</strong>
    </div>
@endif

@if (session('info'))
    <div id="myAlert" class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('info') }}</strong>
    </div>
@endif

@if (session('error_lockout'))
    <div class="alert alert-danger">
        {{ session('error_lockout') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif

@push('scripts')
    <script>
        var alertElement = document.getElementById('myAlert');
        if (alertElement) {
            setTimeout(hideElement, 2000);
        }

        function hideElement() {
            var alertElement = document.getElementById('myAlert');
            alertElement.style.display = 'none';
        }
    </script>
@endpush
