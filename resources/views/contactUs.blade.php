<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #map {
            height: 500px;
            width: 90%;
        }
    </style>
</head>
<body>
<div class="container-custom" id="page">
    @include('header')
    <!-- New Row of Three Columns -->
    <div class="">
        <div>
            <img src="{{ asset('assets/images/banner_contact_us.png') }}" class="w-100" alt="Image 1">
        </div>
        <div class="container-custom mt-1 mb-5 p-4">
            <h1 class="header-post-title-class">Contact Us</h1>
            <div class="mt-3 row m-4">
                <div class="col-md-8">
                    <p style="">
                        <strong>
                            <span style="color: #823535;">Redwood Peak Limited</span>
                        </strong>
                    </p>
                    <p style="">
                        18/Floor, China Hong Kong Tower, 8-12 Hennessy Road, Wan Chai, Hong Kong.<br>
                        Telephone: (852) 2878 3100 &nbsp; &nbsp;Facsimile: (852) 2509 9233<br>
                        Email: <a style="text-decoration: underline; color: #823535;" href="mailto:IR@redwoodpeak.com">IR@redwoodpeak.com</a>
                    </p>
                    <div id="map" class="mt-5"></div>
                </div>
                <div class="col-md-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 ">
                                <label for="name">{{ __('Your Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-4">
                                <label for="email">{{ __('E-mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-4">
                                <label for="subject">{{ __('Subject') }}</label>
                                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-4">
                                <label for="message">{{ __('Your Message') }}</label>
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="4" required autocomplete="message" autofocus>{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2 ml-0 mr-0">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_REAL_API_KEY&callback=initMap" async defer></script>
<script>
    function initMap() {
        const location = { lat: -34.397, lng: 150.644 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: location,
        });
        const marker = new google.maps.Marker({
            position: location,
            map: map,
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
