@csrf
@if(isset($id))
    <input type="hidden" name="id" value="{{ $id }}">
@endif
<div class="container">

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Arquivo CSV:</label>
        <div class="col-md-6">
            <input id="file" type="file" class="@error('file') is-invalid @enderror" name="file" autocomplete="file">
            @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4  ">
            <button type="submit" id="login_go" class="btn btn-primary float-right">
                Importar
            </button>
        </div>
    </div>
</div>
@section('css')
    <style>
        .container{
            margin-top:30px;
        }
    </style>
@endsection
