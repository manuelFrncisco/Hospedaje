@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Reservaciones</h2>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href="/admin">Atras</a>
            </ol>
            <p>Total de Reservaciones: {{ $reservations->count() }}</p>
            <div class="mb-3">
            
                <a type="submit" href="/admin/reservaciones/crear" class="btn btn-success">Crear Reservar</a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Lodging</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Acciones:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->id }}</td>
                                        <td>{{ $reservation->user->name }}</td>
                                        <td>{{ $reservation->lodging->name }}</td>
                                        <td>{{ $reservation->start_date }}</td>
                                        <td>{{ $reservation->end_date }}</td>
                                        <td>{{ $reservation->created_at }}</td>
                                        <td>{{ $reservation->updated_at }}</td>
                                        <td>
                                            <!-- Botones de acciones -->
                                            <div class="row m-1">
                                                <div class="row m-1">

                                                    <a href="{{route('ReservationEdit', ['id' => $reservation->id]) }}" class="btn btn-primary">Editar</a>
                                                </div>
                                                <div class="row m-1">

                                                    <a href="{{ route('ReservationShow', ['id' => $reservation->id]) }}"
                                                        class="btn btn-info">Ver</a>
                                                    </div>
                                                        <form action="{{route('ReservationDelete', ['id' => $reservation->id])}}" method="POST" class="row m-1">
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

