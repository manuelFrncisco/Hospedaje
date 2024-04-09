@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <div class="container">
        <h1>Crear Ubicación</h1>
        <form action="{{ route('LocationCreate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="streep">Calle</label>
                <input type="text" class="form-control" id="streep" name="streep" required>
            </div>
            <div class="form-group">
                <label for="country_id">País</label>
                <select class="form-control" id="country_id" name="country_id" required>
                    <option value="">Selecciona un país</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="postal">Código Postal</label>
                <input type="text" class="form-control" id="postal" name="postal" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Ubicación</button>
        </form>
    </div>
@endsection
