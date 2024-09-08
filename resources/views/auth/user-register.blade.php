<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <body style="background-color:#F3F5F8  ;font-family: poppins">
        <div class="app-section">
            <div class="login-page" style="background-image: url({{ asset('assets/images/login-bg.jpg') }})">
                <div class="container">
                    <div class="col-xl-12 col-lg-12 col-md-12 login-container">
                        <div class="login-form">
                            <h5 class="text-capitalize" style="font-weight: bold">{{ __('Create a new account') }}</h5>
                            <form method="POST" action="{{ route('auth.user.register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 form-group mb-2">
                                        <label for="first_name">{{ __('Username') }}</label>
                                        <input type="text" autofocus
                                            class="form-control  @error('username') is-invalid @enderror" id="username"
                                            name="username" value="{{ old('username') }}" placeholder="{{ __('Enter Your Username') }}">
                                        @error('username')
                                            <small class="text-danger d-block">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group mb-2">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="text"
                                            class="form-control  @error('email') is-invalid @enderror" id="email"
                                            name="email" value="{{ old('email') }}" placeholder="{{ __('Enter your Email') }}">
                                        @error('email')
                                            <small class="text-danger d-block">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 mb-2">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input type="password"
                                            class="form-control mb-1  @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="{{ __('Enter your password') }}" value="{{ old('password') }}"
                                            >
                                        @error('password')
                                            <small class="text-danger d-block">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                        {{-- <a class="text-decoration-none" href="">Forgot your password ?</a> --}}
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 mb-2">
                                        <label for="password_confirmation">{{ __('Password confirmation') }}</label>
                                        <input type="password"
                                            class="form-control mb-1  @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" name="password_confirmation" placeholder="{{ ('Enter your Password confirmation') }}" value="{{ old('password_confirmation') }}"
                                            >
                                        @error('password_confirmation')
                                            <small class="text-danger d-block">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                        {{-- <a class="text-decoration-none" href="">Forgot your password ?</a> --}}
                                    </div>
                                </div>

                                @if (Session::has('error'))
                                    <div class="form-group">
                                        <small class="text-danger">
                                            {{ Session::get('error') }}
                                        </small>
                                    </div>
                                @endif

                                <div class="form-group mt-3 mb-2">
                                    <button type="submit" class="btn btn-primary w-100">{{ __('Register') }}r</button>
                                </div>
                            </form>

                            {{ __('Do you have an account?') }}<a href="{{ route('auth.showLoginForm') }}" class="text-decoration-none  ml-2">{{ __('Log In') }}</a>
                            {{-- <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password</a> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </body>

</html>
