@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="m-4">
            <h1>Crear País</h1>
            <form action="{{ route('CountryCreate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear País</button>
            </form>
        </div>
    </div>
@endsection
