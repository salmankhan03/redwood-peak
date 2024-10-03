<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>News – Redwood Peak Limited</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container" id="page">
        @include('header')
    </div>
        <div>
            <img src="{{ asset('assets/images/banner_news.png') }}" class="bannerHeight" alt="News Banner">
        </div>
        <div class="container">
            <div class="container-custom mt-1 mb-5 p-4">
                <h1 class="header-post-title-class" style="top:0px">News</h1>
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                    </div>
                </div>
            </div>
        </div>
        @include('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    
    </script>
</body>
</html>
