@extends('layouts.panel')

@section('content')
    <div class="container">
        <h1>Editar Alojamiento</h1>
        <form action="{{ route('LodgingEdit', $lodging->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $lodging->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $lodging->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="text" class="form-control" id="image" name="image" value="{{$lodging->image}}">
            </div>
            <div class="form-group">
                <label for="backroom">Backroom</label>
                <input type="text" class="form-control" id="backroom" name="backroom" value="{{ $lodging->backroom }}" required>
            </div>
            <div class="form-group">
                <label for="location_id">Ubicación</label>
                <select class="form-control" id="location_id" name="location_id" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ $lodging->location_id == $location->id ? 'selected' : '' }}>{{ $location->street }}, {{ $location->country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="page">Precio</label>
                <input type="text" class="form-control" id="page" name="page" value="{{ $lodging->page }}" required>
            </div>
            <div class="form-group">
                <label for="start_range">Fecha de Inicio</label>
                <input type="date" class="form-control" id="start_range" name="start_range" value="{{ $lodging->start_range }}" required>
            </div>
            <div class="form-group">
                <label for="end_range">Fecha de Fin</label>
                <input type="date" class="form-control" id="end_range" name="end_range" value="{{ $lodging->end_range }}" required>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary">Actualizar Alojamiento</button>
        </form>
    </div>
@endsection
