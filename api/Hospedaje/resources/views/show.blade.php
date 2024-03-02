@extends('layouts.app')

@section('title', 'WelcomeNest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-3 pt-5 mt-5 bsb-tpl-bg-platinum">
            <h2>{{$lodging->name}}</h2>
            <p>{{$lodging->description}}</p>
            <img class="card-img-top" src="{{$lodging->image}}" height="300">
            <p>{{$lodging->backroom}}</p>
            <p>{{$lodging->user->name}}</p>
            @auth
            @if (auth()->user()->id === $user->id)
            <a href="{{ route('editar', $lodging->id) }}" class="btn btn-primary">Editar Publicación</a>
            @endif
            @endauth
        </div>
    </div>
</div>
@endsection