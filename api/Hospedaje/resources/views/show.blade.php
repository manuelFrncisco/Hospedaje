@extends('layouts.app')

@section('title', 'WelcomeNest')

@section('content')
    <div class="container">
        <div class="row pt-5 p-5">
            <div class="col mt-5 pt-5 col-md-6 bsb-tpl-bg-platinum">
                <img class="card-img-top" src="{{ $lodging->image }}" height="500">


                @foreach ($reservations as $reservation)
                    @if ($reservation->hasEnded())
                        @if ($reservation->hasUserRated(auth()->id()))
                        @else
                            <!-- Formulario de calificación -->
                            <div>
                                <form method="POST" action="{{ route('rating') }}">
                                    @csrf
                                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                    <div id="star-rating" name="number">
                                        <input type="hidden" name="number" id="rating" value="0">
                                        <svg id="star-1" data-rating="1" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor"
                                            class="bi bi-star"viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg id="star-2" data-rating="2" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor"
                                            class="bi bi-star"viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg id="star-3" data-rating="3" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor"
                                            class="bi bi-star"viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg id="star-4" data-rating="4" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor"
                                            class="bi bi-star"viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg id="star-5" data-rating="5" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor"
                                            class="bi bi-star"viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                    </div>
                                    <button type="submit">Calificar</button>
                                </form>
                            </div>
                        @endif
                    @endif
                @endforeach



                @if (Auth::check())
                    <div class="mt-4">
                        <div class="card-body">
                            <form action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="lodging_id" value="{{ $lodging->id }}">
                                <div class="input-group mb-3">
                                    <textarea class="form-control" id="messaje" name="messaje" rows="1"></textarea>
                                    <button type="submit" class="btn btn-primary">Comentar</button>
                                </div>
                                <div class="form-group">


                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                @foreach ($comments as $comment)
                    <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="card w-50 mt-3">
                            <div class="card-body">
                                <p class="card-text">{{ $comment->messaje }}</p>
                                @if (Auth::check())
                                    <a href="#" class="btn btn-danger">Eliminar</a>
                                @endif
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
            <div class="col col-md-6 pt-5 mt-5 bsb-tpl-bg-platinum">
                <h2>{{ $lodging->name }}</h2>
                <p>{{ $lodging->description }}</p>

                <div class=" mt-2">

                    <p>Baños: {{ $lodging->backroom }}</p>

                </div>
                <p>Empresa: {{ $lodging->user->name }}</p>

                <div id="star-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-star{{ $averageRating >= $i ? '-fill' : '' }}"viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                    @endfor
                </div>
                <hr>

                <h2>$ {{ $lodging->page }}</h2>
                @if (Auth::check())
                    <a href="{{ route('reservafrom', $lodging->id) }}" class="btn btn-primary mt-2">Reservar</a>
                @endif

                <div class="card mt-2">
                    @auth
                        @if (auth()->user()->id === $lodging->user->id)
                            <div class="card-body">
                                <h3>Editar publicacion:</h3>

                                <a href="{{ route('editar', $lodging->id) }}" class="btn btn-primary mb-3">Editar
                                    Publicación</a>
                                <form action="{{ route('delete', $lodging->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </div>
@endsection
