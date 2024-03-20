@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')

        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">Ofertas</h2>
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
                                    <th>Precio</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($oferts as $ofert)
                                    <tr>
                                        <td>{{ $ofert->id }}</td>
                                        <td>{{ $ofert->name }}</td>
                                        <td>{{ $ofert->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

@endsection()