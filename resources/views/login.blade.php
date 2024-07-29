<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login – Redwood Peak Limited</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container-custom" id="page">
    @include('header')

        <!-- New Row of Three Columns -->
            <div class="container-custom mb-5 p-2">
                <h1 class="header-post-title-class">Login</h1>
                <div class="mt-4">
                    <!-- Login Form -->
                    <div class="mt-5 m-3">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label for="email">{{ __('E-mail') }}</label> <br/>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>                              
                            </div>
                            <div class="form-group form-check mt-5 mb-1">
                                <input type="checkbox" class="form-check-input w-auto" id="remember" name="remember">
                                <label class="form-check-label" for="remember">{{ __('Keep me signed in') }}</label>
                            </div>


                   
                    <!-- Login Form -->
                    
                    <div class="form-group row mb-0 mt-2 ml-0 mr-0">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="ml-3">
                            <button type="button" class="btn btn-secondary" onclick="redirectToRegister()" >
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>

        </div>
        @include('footer')
    </div>

    <script>
       function redirectToRegister() {
            window.location.href = "{{ route('register') }}";
        }
    </script>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
