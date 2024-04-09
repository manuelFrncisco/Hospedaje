@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Editar Nivel</h2>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="/admin/levels">Atras</a>
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('LevelEdit', ['id' => $level->id]) }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $level->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Estado (1-3)</label>
                    <input type="number" class="form-control" id="status" name="status" value="{{ $level->status }}" required min="1" max="3">
                </div>
                
                <button type="submit" class="btn btn-primary">Actualizar Nivel</button>
            </form>
        </div>
    </div>
</main>
@endsection
