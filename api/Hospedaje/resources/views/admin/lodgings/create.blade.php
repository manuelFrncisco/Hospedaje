@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Crear Alojamiento</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin/alojamiento">Atras</a>
            </ol>
            <div class="card mb-4 p-3">

                <form action="{{ route('LodgingCreate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2 mt-2">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-2 mt-2">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group mb-2 mt-2">
                        <label for="image">Imagen</label>
                        <input type="text" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="form-group mb-2 mt-2">
                        <label for="backroom">Backroom</label>
                        <input type="text" class="form-control" id="backroom" name="backroom" required>
                    </div>
                    <div class="form-group mb-2 mt-2">
                        <label for="location_id">Ubicación</label>
                        <input type="text" class="form-control" id="location_id" value="">
                    </div>
                    <div class="form-group mb-3 mt-3">
                        <label for="start_range">Inicio Reserva</label>
                        <input type="date" class="form-control" id="start_range" name="start_range" required>
                    </div>
                    <div class="form-group mb-3 mt-3">
                        <label for="end_range">Fin de Reserva</label>
                        <input type="date" class="form-control" id="end_range" name="end_range" required>
                    </div>
                    <div class="form-group mb-2 mt-2">
                        <label for="page">Precio</label>
                        <input type="text" class="form-control" id="page" name="page" required>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <div class="row pb-3"></div>
                    <button type="submit" class="btn btn-primary">Crear Alojamiento</button>
                </form>
            </div>
        </div>
    </main>
@endsection
