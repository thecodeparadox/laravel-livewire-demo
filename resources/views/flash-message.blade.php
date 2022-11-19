@if (session('info'))
    <div class="alert alert-info" role="alert">
        {{ __(session('info')) }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ __(session('success')) }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning" role="alert">
        {{ __(session('waring')) }}
    </div>
@endif

@if (session('error') || session('danger'))
    <div class="alert alert-danger" role="alert">
        {{ __(session('error') ?? session('danger')) }}
    </div>
@endif