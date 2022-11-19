@if (session('info'))
    <div class="alert alert-info" role="alert">
        {{ session('info') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning" role="alert">
        {{ session('waring') }}
    </div>
@endif

@if (session('error') || session('danger'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') ?? session('danger') }}
    </div>
@endif