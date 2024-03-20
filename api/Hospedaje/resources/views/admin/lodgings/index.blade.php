@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')

        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">Alojamiento</h2>
                <ol class="breadcrumb mb-4">
                    <a class="breadcrumb-item active" href="/admin">Atras</a>
                </ol>
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
                                    <th>Oferta</th>
                                    <th>Localizacion</th>
                                    <th>Usuario</th>
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
                                        <td>{{ $lodging->ofert->name}}</td>
                                        <td>{{ $lodging->location->streep }}</td>
                                        <td>{{ $lodging->user->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>


@endsection()