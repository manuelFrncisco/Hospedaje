@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Crear Nivel</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin/nivel">Atras</a>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('LevelCreate') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="number" class="form-control" id="status" name="status" min="1"
                                max="3" step="1" required>
                        </div>
                        <button type="submit" class="btn btn-success">Crear Nivel</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
