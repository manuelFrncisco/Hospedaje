@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')

        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">Alojamiento</h2>
                <ol class="breadcrumb mb-4">
                    <a class="breadcrumb-item active" href="/admin">Atras</a>
                    <p>Total de Alojamientos: {{ $lodgings->count() }}</p>
                </ol>
                <div class="mb-3">
                    <a type="submit" href="{{route('alojamientoCrear')}}" class="btn btn-success">Crear Alojamiento</a>

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th>Precio</th>
                                    <th>Rango de Inicio</th>
                                    <th>Rango de Fin</th>
                                    <th>Baños</th>
                                    <th>Localizacion</th>
                                    <th>Empresa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lodgings as $lodging)
                                    <tr>
                                        <td>{{ $lodging->id }}</td>
                                        <td>{{ $lodging->name }}</td>
                                        <td>{{ $lodging->description}}</td>
                                        <td>{{ $lodging->image}}</td>
                                        <td>{{ $lodging->page}}</td>
                                        <td>{{ $lodging->start_range}}</td>
                                        <td>{{ $lodging->end_range}}</td>
                                        <td>{{ $lodging->backroom}}</td>
                                        <td>{{ $lodging->location->streep }}</td>
                                        <td>{{ $lodging->user->name }}</td>
                                        <td>
                                            <!-- Botones de acciones -->
                                            <a href="{{route('alojamientoEditar', ['id' => $lodging->id]) }}" class="btn btn-primary">Editar</a>
                                            <form action="{{route('LodgingDelete', ['id' => $lodging->id])}}" method="POST">
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