@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Paises</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin">Atras</a>
            </ol>
            <p>Total de países: {{ $countries->count() }}</p>
            <div class="mt-3 mb-3">
                <a href="{{ route('paisCrear') }}" class="btn btn-success">Crear Paises</a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                    <tr>
                                        <td>{{ $country->id }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td>{{ $country->status }}</td>
                                        <td>
                                            <a href="{{ route('paisEditar', ['id' => $country->id]) }}"
                                                class="btn btn-primary">Editar</a>
                                            <a href="{{ route('paisShow', ['id' => $country->id]) }}"
                                                class="btn btn-info">Ver</a>
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
@endsection()
