@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')


        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">Calificaciones</h2>
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
                                    <th>Number</th>
                                    <th>User</th>
                                    <th>Lodging</th>
                                    <th>Reservacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ratings as $rating)
                                    <tr>
                                        <td>{{ $rating->id }}</td>
                                        <td>{{ $rating->number }}</td>
                                        <td>{{ $rating->user->name }}</td>
                                        <td>{{ $rating->lodging->name }}</td>
                                        <td>{{ $rating->reservation->id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>


@endsection()