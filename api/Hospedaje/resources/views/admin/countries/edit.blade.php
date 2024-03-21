@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="m-5">

            <h1>Editar País</h1>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin/paises">Atras</a>
            </ol>
            <form action="{{ route('CountryEdit', $country->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $country->name }}"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar País</button>
            </form>
        </div>
    </div>
@endsection
