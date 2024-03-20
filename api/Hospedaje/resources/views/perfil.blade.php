@extends('layouts.app')

@section('title', 'WelcomeNest')

@section('content')

<div class="pt-5 p-5">
  <div class="pt-5 p-5">

    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-6 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                      <div class="col-md-4 gradient-custom text-center text-white"
                      style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                      <img src="{{ $user->image }}"
                      alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                      <!-- Nombre de usuario-->
                      <h6 class="text-black">{{ $user->name }}</h6>
                      <!-- SurName de usuario-->
                      <h6 class="text-black">{{ $user->surname }}</h6>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body p-4">
                        <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                  <div class="col-6 mb-3">
                                    <h6>Email</h6>
                                    <p class="text-muted">{{ $user->email }}</p> <!-- Email de usuario -->
                                  </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="text-muted">{{ $user->phone }}</p> <!-- Telefono -->
                                    </div>
                                </div>
                                <hr class="mt-0 mb-4">
                                <div class="d-flex justify-content-start">
                                  <a href="/user/perfil" class="btn bsb-btn-xl btn-editar text-white">Editar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="card-body">
                <h3>Reservaciones:</h3>
                @if ($reservations)
                <ul>
                  @foreach ($reservations as $reservation)
                  <li>{{ $reservation->start_date }} - {{ $reservation->end_date }}
                    {{ $reservation->lodging->name }}</li>
                            <form action="{{ route('dropReservation', $reservation->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            @endforeach
                            
                          </ul>
                @else
                <p>No tienes reservaciones.</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
          

@endsection
