@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 pt-5 mt-5">
                <div class="pt-5 mb-5">
                    <div class="card">
                        <div class="card-header">{{ __('Create') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('create') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}" required autocomplete="description" cols="30"
                                            rows="10"></textarea>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="url"
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                            value="{{ old('image') }}" required autocomplete="image">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="streep"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Streep') }}</label>

                                    <div class="col-md-6">
                                        <input id="streep" type="streep"
                                            class="form-control @error('streep') is-invalid @enderror" name="streep"
                                            required autocomplete="new-streep">

                                        @error('streep')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="backroom"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Backroom') }}</label>

                                    <div class="col-md-6">
                                        <input id="backroom" type="backroom"
                                            class="form-control @error('backroom') is-invalid @enderror" name="backroom"
                                            required autocomplete="new-backroom">

                                        @error('backroom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="country_name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <input id="country_name" type="country_name"
                                            class="form-control @error('country_name') is-invalid @enderror"
                                            name="country_name" required autocomplete="new-country_name">

                                        @error('country_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="postal"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Postal') }}</label>

                                    <div class="col-md-6">
                                        <input id="postal" type="postal"
                                            class="form-control @error('postal') is-invalid @enderror" name="postal"
                                            required autocomplete="new-postal">

                                        @error('postal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="page"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Page') }}</label>

                                    <div class="col-md-6">
                                        <input id="page" type="page"
                                            class="form-control @error('page') is-invalid @enderror" name="page" required
                                            autocomplete="new-page">

                                        @error('page')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="start_range"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Start_range') }}</label>

                                    <div class="col-md-6">
                                        <input id="start_range" type="date"
                                            class="form-control @error('start_range') is-invalid @enderror"
                                            name="start_range" required autocomplete="new-start_range">

                                        @error('start_range')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="end_range"
                                        class="col-md-4 col-form-label text-md-end">{{ __('End_range') }}</label>

                                    <div class="col-md-6">
                                        <input id="end_range" type="date"
                                            class="form-control @error('end_range') is-invalid @enderror" name="end_range"
                                            required autocomplete="new-end_range">

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
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
