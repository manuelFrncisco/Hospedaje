@extends('layouts.app')

@section('title', 'WelcomeNest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 pt-5 mt-5">
                <div class="pt-5 p-5">
                    <div class="card">
                        <div class="card-header">{{ __('Reservacion') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('reserve') }}">
                                @csrf
                                <input type="hidden" name="lodging_id" value="{{ $lodging->id }}">
                                <p>Fecha de inicio: {{ $lodging->start_range }}</p>
                                <p>Fecha de fin: {{ $lodging->end_range }}</p>
                                <button type="submit" class="btn btn-primary">Reservar</button>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
