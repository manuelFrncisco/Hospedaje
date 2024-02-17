@extends('layouts.app')

@section('title', 'WelcomeNest')

@section('content')
<div class="container">
    <div class="row">
        @foreach($lodgings as $lodging)
        <div class="col col-md-3 pt-5 mt-5 bsb-tpl-bg-platinum">
            <a class="text-decoration-none text-black" href="#">
                <div class="d-flex flex-column justify-content-between h-100 mt-3">
                    <div class="card m-2" style="width: 18rem;">
                        <img src="{{$lodging->image}}" class="card-img-top" alt="..."
                            height="300">
                        <div class="card-body">
                            <h5 class="card-title">{{$lodging->name}}</h5>
                            <p class="card-text">{{$lodging->location->streep}}</p>
                            <p class="card-text bg-danger rounded-1 p-1 text-white">{{$lodging->package->page}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection