@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Comentarios</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin">Atras</a>
            </ol>
            <p>Total de Comentarios: {{ $comments->count() }}</p>
            <div class="mb-3">
                <a href="{{ route('comentarioCrear') }}" class="btn btn-success">Crear Comentario</a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Messaje</th>
                                    <th>User</th>
                                    <th>Lodging</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->messaje }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->lodging->name }}</td>
                                        <td>
                                            <!-- Botones de acciones -->
                                            <div class="row m-1">
                                                <div class="row m-1">
                                                    <a href="{{ route('comentarioEditar', ['id' => $comment->id]) }}"
                                                        class="btn btn-primary">Editar</a>
                                                </div>
                                                <div class="row m-1">
                                                    <a href="{{ route('commentShow', ['id' => $comment->id]) }}"
                                                        class="btn btn-info">Ver</a>
                                                </div>
                                                <form action="{{ route('CommentDelete', ['id' => $comment->id]) }}"
                                                    method="POST" class="row m-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
