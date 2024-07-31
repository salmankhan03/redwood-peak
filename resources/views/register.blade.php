<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register – Redwood Peak Limited</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .min-heights{
            min-height:90vh
        }
    </style>
</head>
<body>
<div class="container" id="page">
    @include('header')
</div>

        <!-- New Row of Three Columns -->
        <div class="container">
            <div class="container-custom mb-5 p-2 min-heights">
                <h1 class="header-post-title-class">Register</h1>
                <div class="mt-4 inside-container">
                    <div class="">
                        <div class="">
                            <span style="color: #823535; text-align: center; font-size: 22px;">
                                Register for member-level access
                            </span>
                        </div>
                        <div class="pt-3">
                            <span style="color: #823535; text-align: center;">
                                Your password must contain at least one small letter, one capital letter and one number
                            </span>
                        </div>
                    </div>
                    <!-- Registration Form -->
                    <div class="mt-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="email">{{ __('E-mail') }}</label> <br/>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>                              
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="first_name">{{ __('First Name') }}</label>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>                               
                            </div>

                            <div class="row mt-4">
                                <div class=" col-md-6">
                                    <label for="last_name">{{ __('Last Name') }}</label><br/>
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                

                                <div class="col-md-6">
                                <label for="country">{{ __('Country') }}</label>
                                    <select id="country" class="form-control @error('country') is-invalid @enderror" name="country" required>
                                        <option value="">Select Country</option>
                                        <!-- Populate this with your country options -->
                                        <option value="USA">United States</option>
                                        <option value="CAN">Canada</option>
                                        <!-- Add more countries as needed -->
                                    </select>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  
                                </div>
                            
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="company_name">{{ __('Compnay Name') }}</label>
                                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                                        @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="contact">{{ __('Contact') }}</label> <br/>
                                    <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact">

                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>                               
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="position">{{ __('Position') }}</label>
                                    <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position"
                                        value="{{ old('position') }}" required autocomplete="position" autofocus>

                                    @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                   
                    <!-- Registration Form -->
                    <div class="mt-5">
                        <div class="" style="font-size:17px">
                            * For investor-level access please 
                            <b>
                                <i><a href="http://redwoodpeak.com/contact-us/" target="_blank">contact us</a>&nbsp;</i>
                            </b>to ascertain your status as a professional investor.
                        </div>
                    </div>
                    <div class="form-group row mb-0 mt-5">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="ml-3">
                        <button type="button" class="btn btn-secondary" onclick="redirectToLogin()">
                            {{ __('Login') }}
                        </button>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
        @include('footer')

    <script>
        $(document).ready(function() {
            $('#country').select2({
                placeholder: "Select a country",
                allowClear: true
            });
        });
        function redirectToLogin() {
            window.location.href = "{{ route('login') }}";
        }
    </script>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
