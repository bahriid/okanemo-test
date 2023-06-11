@if ($errors->any())
    <div class="alert alert-dismissible bg-danger d-flex flex-column align-items-center flex-sm-row p-5 ">
        <div class="d-flex flex-column align-items-center text-light ">
            <p class="m-0">Upss! Terjadi Kesalahan</p>
        </div>
    </div>
    @if(!App::environment('production'))
        <div>
            @foreach ($errors->all() as $error)
                [{{ $error }}],
            @endforeach
        </div>
    @endif
@endif
