@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Nivel</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin">Atras</a>
            </ol>
            <p>Total de Niveles: {{ $levels->count() }}</p>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="mb-3">
                        <a type="submit" href="{{route('levelCrear')}}" class="btn btn-success">Crear Nivel</a>

                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $level)
                                <tr>
                                    <td>{{ $level->id }}</td>
                                    <td>{{ $level->name }}</td>
                                    <td>{{ $level->status }}</td>
                                    <td>
                                        <!-- Botones de acciones -->
                                        <a href="{{ route('levelEditar', ['id' => $level->id]) }}"
                                            class="btn btn-primary">Editar</a>
                                            <a href="{{ route('levelShow', ['id' => $level->id]) }}"
                                                class="btn btn-info">Ver</a>
                                        <form action="{{ route('LevelDelete', ['id' => $level->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection()
