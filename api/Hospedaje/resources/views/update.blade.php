@extends('layouts.app')

@section('title', 'WelcomeNest')

@section('content')
<div class="card-body pt-5 p-5">
  <div class="pt-5">

    @csrf
    <form method="POST" action="{{route('editar', $lodging->id)}}">
    
      <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

        <div class="col-md-6">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus>

          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

        <div class="col-md-6">
          <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
            value="{{ old('description') }}" required autocomplete="description">

          @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

        <div class="col-md-6">
          <input id="image" type="image" class="form-control @error('image') is-invalid @enderror" name="image"
            value="{{ old('image') }}" required autocomplete="image">

          @error('image')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="backroom" class="col-md-4 col-form-label text-md-end">{{ __('Backroom') }}</label>

        <div class="col-md-6">
          <input id="backroom" type="backroom" class="form-control @error('backroom') is-invalid @enderror" name="backroom"
            value="{{ old('backroom') }}" required autocomplete="backroom">

          @error('backroom')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="streep" class="col-md-4 col-form-label text-md-end">{{ __('Streep') }}</label>

        <div class="col-md-6">
          <input id="streep" type="streep" class="form-control @error('streep') is-invalid @enderror" name="streep"
            value="{{ old('streep') }}" required autocomplete="streep">

          @error('streep')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="city_name" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

        <div class="col-md-6">
          <input id="city_name" type="city_name" class="form-control @error('city_name') is-invalid @enderror" name="city_name"
            value="{{ old('city_name') }}" required autocomplete="backroom">

          @error('city_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="country_name" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

        <div class="col-md-6">
          <input id="country_name" type="country_name" class="form-control @error('country_name') is-invalid @enderror" name="country_name"
            value="{{ old('country_name') }}" required autocomplete="country_name">

          @error('country_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="page" class="col-md-4 col-form-label text-md-end">{{ __('Page') }}</label>

        <div class="col-md-6">
          <input id="page" type="page" class="form-control @error('page') is-invalid @enderror" name="page"
            value="{{ old('page') }}" required autocomplete="page">

          @error('page')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="start_range" class="col-md-4 col-form-label text-md-end">{{ __('Start_Range') }}</label>

        <div class="col-md-6">
          <input id="start_range" type="start_range" class="form-control @error('start_range') is-invalid @enderror" name="start_range"
            value="{{ old('start_range') }}" required autocomplete="start_range">

          @error('start_range')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="end_range" class="col-md-4 col-form-label text-md-end">{{ __('End_Range') }}</label>

        <div class="col-md-6">
          <input id="end_range" type="end_range" class="form-control @error('end_range') is-invalid @enderror" name="end_range"
            value="{{ old('end_range') }}" required autocomplete="end_range">

          @error('end_range')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection