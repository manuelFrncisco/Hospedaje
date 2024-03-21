@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="container-fluid px-4">
            <h2 class="mt-4">Comentarios</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin/comentarios">Atras</a>
            </ol>
        </div>
        <form action="{{ route('CommentEdit', $comment->id) }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="messaje">Mensaje</label>
                <textarea class="form-control" id="messaje" name="messaje" rows="3">{{ $comment->messaje }}</textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
            <div class="form-group">
                <label for="lodging_id">Lodging</label>
                <select class="form-control" id="lodging_id" name="lodging_id">
                    @foreach($lodgings as $lodging)
                        <option value="{{ $lodging->id }}" {{ $comment->lodging_id == $lodging->id ? 'selected' : '' }}>{{ $lodging->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Comentario</button>
        </form>
    </div>
@endsection