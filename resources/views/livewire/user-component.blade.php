<div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-12 mb-4 mt-3 px-3 d-flex justify-content-between">
        <a href="{{ route('admin') }}" class="btn btn-outline-primary">Admin</a>
        <h3>{{ auth()->user()->name }}</h3>
    </div>
</div>
