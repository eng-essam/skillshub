@if (session('success'))
    <div style="display: flex;justify-content: center" class="alert alert-success">
        <div>{{ session('success') }}</div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        <div>{{ session('status') }}</div>
    </div>
@endif
