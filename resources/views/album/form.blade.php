@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create album') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('album.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Album Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="artist" class="col-md-4 col-form-label text-md-right">{{ __('Artist') }}</label>

                            <div class="col-md-6">
                                @if (isset($artist))
                                    <select name="artist_id" id="artist" class="form-control">
                                        <option value="{{$artist[0]['id']}}" selected>{{$artist[0]['name']}}</option>
                                    </select>
                                @else
                                    <select name="artist_id" id="artist" class="form-control">
                                        <option value="" selected hidden>Choose one artist</option>
                                        @foreach ($artists as $artist)
                                            <option value="{{$artist[0]['id']}}" >{{$artist[0]['name']}}</option>
                                        @endforeach
                                    </select>
                                @endif
                                @error('artist')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input type="number" min="1900" max="2099" step="1" class="form-control" name="year" value="{{ old('year') }}" />
                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
