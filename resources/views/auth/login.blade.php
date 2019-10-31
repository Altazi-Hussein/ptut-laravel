@extends('layouts.app')

@section('titleContent', 'Connexion')

@section('content')
<div class="container">
    {{--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>--}}
                    <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group column">
                            <label for="email" class=" col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                            <div class="{{-- col-md-6 --}}">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <label for="password" class="pr-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="{{-- col-md-6 --}}">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <div class="{{-- col-md-6 offset-md-4 --}}">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se rappeler de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group column mb-0">
                            <div class="{{-- col-md-8 offset-md-4 --}}">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Se connecter') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            {{--</div>
        </div>
    </div>--}}
</div>
<a class="btn bg-primary p-2 mt-2 text-light float-left" href="{{ url('/')}}">Retour</a>
@endsection
