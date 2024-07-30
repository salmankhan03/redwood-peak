<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Our Mission</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    
    </style>
</head>
<body>
    <div class="container-custom" id="page">
        @include('header')
        <div >
            <div>
                <img src="{{ asset('assets/images/about-slider.jpg') }}" class="w-100" alt="Image 1">
            </div>
            <div class="container-custom mt-1 mb-5 p-4">
                <h1 class="header-post-title-class">Our Mission</h1>
                <div class="mt-3">
                    <h3 class="fancytitle">
                        <em>“Our
                            mission is to achieve investment excellence for our clients through a </em><br>
                        <em>results-oriented partnership between our clients, employees, and constituents.”</em>
                    </h3>
                    <p style="">
                        Redwood Peak is run for the benefit of its investors and employees whose objectives are
                        completely aligned. Profit without performance, size for its own sake, socially irresponsible
                        investing, and the unilateral prosperity of employees without investors are to be rejected. Our
                        firm should be successful if we work hard to attain investment excellence and integrity while
                        placing the interests of our clients first.
                    </p>
                    <p style="">
                        <span style="color: #823535;">To serve the clients</span><br>
                        • To align our success with the objectives and success of our client<br>
                        • To place the interests of our clients first
                    </p>
                    <p style="">
                        <span style="color: #823535;">Respect for the individual</span><br>
                        • To deal fairly and honestly with our business partners and associates<br>
                        • To communicate openly and to be transparent with our partners and clients and employees
                    </p>
                    <p style="">
                        <span style="color: #823535;">To strive for excellence</span><br>
                        • To measure performance contribution<br>
                        • To be a good corporate citizen by contributing to the community and making socially
                        responsible investments
                    </p>
                </div>
            </div>

        </div>
        @include('footer')
    </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
