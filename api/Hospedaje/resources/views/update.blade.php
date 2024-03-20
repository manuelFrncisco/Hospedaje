@extends('layouts.app')

@section('title', 'WelcomeNest')

@section('content')
<div class="pt-5 p-5">

  <div class="card-body pt-5 p-5">
    <div class="pt-5">
      
      <form method="POST" action="{{ route('update-lodging') }}" >
        @csrf
        <input type="hidden" name="id" value="{{ $lodging->id }}">
        <div class="row mb-3">
          <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

          <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{$lodging->name}}" required autocomplete="name" autofocus>
            
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
          value="{{$lodging->description }}" required autocomplete="description">
          
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
          <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image"
          value="{{$lodging->image}}" required autocomplete="image">
          
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
          <input id="backroom" type="text" class="form-control @error('backroom') is-invalid @enderror" name="backroom"
          value="{{$lodging->backroom}}" required autocomplete="backroom">
          
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
          <input id="streep" type="text" class="form-control @error('streep') is-invalid @enderror" name="streep"
          value="{{ $lodging->location->streep}}" required autocomplete="streep">
          
          @error('streep')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      
      
      <div class="row mb-3">
        <label for="new_country_id" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
        <div class="col-md-6">
          <select id="new_country_id" class="form-select" name="new_country_id">
            @foreach($countries as $country)
            <option value="{{ $country->id }}" @if($lodging->location->country_id == $country->id) selected @endif>{{ $country->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      
      
      
      <div class="row mb-3">
        <label for="page" class="col-md-4 col-form-label text-md-end">{{ __('Page') }}</label>
        
        <div class="col-md-6">
          <input id="page" type="text" class="form-control @error('page') is-invalid @enderror" name="page"
          value="{{ $lodging->page}}" required autocomplete="page">
          
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
          <input id="start_range" type="date" class="form-control @error('start_range') is-invalid @enderror" name="start_range"
          value="{{ $lodging->start_range }}" required autocomplete="start_range">
          
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
          <input id="end_range" type="date" class="form-control @error('end_range') is-invalid @enderror" name="end_range"
          value="{{ $lodging->end_range}}" required autocomplete="end_range">

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

      @endsection