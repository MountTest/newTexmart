@extends('layouts.promo')

@section('content')

    <div class="promo-register">
        <div class="backdrop"></div>
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-12 col-lg-8 shadow-lg">
                    <div class="row">
{{--                        <div class="col-md-auto col-2 bg-light rounded-left py-3 text-secondary">--}}
{{--                            <ul class="nav flex-column">--}}
{{--                                <li class="nav-item my-2">--}}
{{--                                    <a href="{{ route('google.redirect', 'facebook') }}" class="text-secondary">--}}
{{--                                        <i class="fab fa-facebook fa-lg"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item my-2">--}}
{{--                                    <a href="{{ route('google.redirect', 'vk') }}" class="text-secondary">--}}
{{--                                        <i class="fab fa-vk fa-lg"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item my-2">--}}
{{--                                    <a href="{{ route('google.redirect', 'google') }}" class="text-secondary">--}}
{{--                                        <i class="fab fa-google fa-lg"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item my-2">--}}
{{--                                    <a href="{{ route('google.redirect', 'twitter') }}" class="text-secondary">--}}
{{--                                        <i class="fab fa-twitter fa-lg"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item my-2">--}}
{{--                                    <a href="{{ route('google.redirect', 'odnoklassniki') }}" class="text-secondary">--}}
{{--                                        <i class="fab fa-odnoklassniki-square fa-lg"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div class="col-12 col-md-6 shadow-left bg-white p-4">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <label for="email" class=""><i class="fas fa-envelope text-primary"></i> {{ __('E-Mail') }}</label>

                                    <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class=""><i class="fas fa-key text-primary"></i> {{ __('Пароль') }}</label>

                                    <input id="password" type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class=""><i class="fas fa-key text-primary"></i> {{ __('Подтвердите пароль') }}</label>

                                    <input id="password-confirm" type="password" class="form-control rounded-pill" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary rounded-pill">
                                        {{ __('Восстановить пароль') }}
                                    </button>
                                </div>
                                <div class="form-group small text-dark text-center mt-1">
                                    Еще нет логина? <a href="{{ route('register') }}"
                                                       class="text-primary">Регистрация</a>
                                </div>
                            </form>

                        </div>
                        <div
                            class="col d-flex align-items-center justify-content-center bg-info text-white p-4 rounded-right">
                            <div>
                                <div class="mb-3 mx-auto">
                                    <a href="{{ url('/') }}" class="h1 text-white text-center">
                                        <img src="{{ asset('img/logo.png') }}" width="200px" height="auto" alt="">
                                    </a>
                                </div>
                                <h2 class="font-weight-bold h1">Преимущества</h2>
                                <ul class="nav flex-column">
                                    <li class="nav-item"><i class="fas fa-check"></i> Бесплатные консультации</li>
                                    <li class="nav-item"><i class="fas fa-check"></i> Связь с производством</li>
                                    <li class="nav-item"><i class="fas fa-check"></i> 0% комиссий</li>
                                    <li class="nav-item"><i class="fas fa-check"></i> Дешево</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
