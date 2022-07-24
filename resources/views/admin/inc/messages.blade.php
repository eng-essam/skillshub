@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


@if (session('msg'))
    <div style="display: flex;justify-content: center" class="alert alert-success">
        <div>{{ session('msg') }}</div>
    </div>
@endif
