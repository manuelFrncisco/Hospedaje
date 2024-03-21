@extends('layouts.panel')

@section('content')
    <div class="container">
        <h1>Editar Ubicación</h1>
        <form action="{{ route('LocationEdit', $location->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="streep">Calle</label>
                <input type="text" class="form-control" id="streep" name="streep" value="{{ $location->streep }}" required>
            </div>
            <div class="form-group">
                <label for="country_id">País</label>
                <select class="form-control" id="country_id" name="country_id" required>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $location->country_id == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="postal">Código Postal</label>
                <input type="text" class="form-control" id="postal" name="postal" value="{{ $location->postal }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Ubicación</button>
        </form>
    </div>
@endsection
