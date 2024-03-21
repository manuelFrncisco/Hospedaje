@extends('layouts.panel')

@section('content')
    <div class="mt-4 m-5">
        <div class="container-fluid px-4">
            <h2 class="mt-4">Crear Comentario</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin">Atras</a>
            </ol>
        </div>
        <form action="{{ route('CommentCreate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="messaje">Mensaje</label>
                <textarea class="form-control" id="messaje" name="messaje" rows="3"></textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="lodging_id">Lodging</label>
                <select class="form-control" id="lodging_id" name="lodging_id">
                    @foreach ($lodgings as $lodging)
                        <option value="{{ $lodging->id }}">{{ $lodging->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Comentario</button>
        </form>
    </div>
@endsection
