@extends('layouts.panel')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Crear País</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin/paises">Atras</a>
            </ol>
            <div class="card mb-4 p-3">
                <form action="{{ route('CountryCreate') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mt-3 mb-3">
                        <button type="submit" class="btn btn-success">Crear País</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
