@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Crear Ubicación</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin/localizacion">Atras</a>
            </ol>
            <div class="card mb-4 p-3">

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
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="postal">Código Postal</label>
                        <input type="text" class="form-control" id="postal" name="postal" required>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Crear Ubicación</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
