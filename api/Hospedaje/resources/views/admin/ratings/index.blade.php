@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')


    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Calificaciones</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin">Atras</a>
            </ol>
            <p>Total de Califiaciones: {{ $ratings->count() }}</p>
            
            <div class="mb-3">
                <a type="submit" href="{{ route('calificacionCrear') }}" class="btn btn-success">Crear Comentario</a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Number</th>
                                    <th>User</th>
                                    <th>Lodging</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ratings as $rating)
                                    <tr>
                                        <td>{{ $rating->id }}</td>
                                        <td>{{ $rating->number }}</td>
                                        <td>{{ $rating->user->name }}</td>
                                        <td>{{ $rating->lodging->name }}</td>
                                        <td>
                                            <!-- Botones de acciones -->
                                            <a href="{{ route('calificacionEditar', ['id' => $rating->id]) }}"
                                                class="btn btn-primary">Editar</a>
                                            <a href="{{ route('ratingShow', ['id' => $rating->id]) }}"
                                                class="btn btn-primary">Ver</a>
                                            <form action="{{ route('RatingDelete', ['id' => $rating->id]) }}"
                                                method="POST">
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
