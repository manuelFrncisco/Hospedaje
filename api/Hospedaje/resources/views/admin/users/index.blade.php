@extends('layouts.panel')
@section('title', 'WelcomeNest - Admin')

@section('content')

<main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">Usuarios</h2>
                <ol class="breadcrumb mb-4">
                    <a class="breadcrumb-item active" href="/admin">Atras</a>
                </ol>
                <p>Total de Usuarios: {{ $users->count() }}</p>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>SurName</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Level_id</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->surname }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td><img src="{{$user->image}}" height="50" width="50"></td>
                                        <td>{{ $user->level_id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
  @endsection