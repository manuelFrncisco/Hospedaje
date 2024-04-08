@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')
        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">Localizacion</h2>
                <ol class="breadcrumb mb-4">
                    <a class="breadcrumb-item active" href="/admin">Atras</a>
                    <p>Total de Localizaciones: {{ $locations->count() }}</p>
                </ol>
                <div class="mb-3">
                    <a type="submit" href="{{ route('localizacionCrear') }}" class="btn btn-success">Crear Localizacion</a>
                </div>
            </div>
            <div class="card mb-4 m-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Streep</th>
                                    <th>Country</th>
                                    <th>Postal</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $location)
                                    <tr>
                                        <td>{{ $location->id }}</td>
                                        <td>{{ $location->streep }}</td>
                                        <td>{{ $location->country->name }}</td>
                                        <td>{{ $location->postal }}</td>
                                        <td>
                                            <!-- Botones de acciones -->
                                            <a href="{{route('localizacionEditar', ['id' => $location->id]) }}" class="btn btn-primary">Editar</a>
                                            <form action="{{route('LocationDelete',  $location->id)}}" method="POST">
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