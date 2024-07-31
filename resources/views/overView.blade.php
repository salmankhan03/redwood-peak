<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Overview</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container" id="page">
    @include('header')
</div>

        <!-- New Row of Three Columns -->
            <div>
                <img src="{{ asset('assets/images/about-slider.jpg') }}" class="w-100 bannerHeight" alt="Image 1">
            </div>
            <div class="container">

                <div class="container-custom mt-1 mb-5 p-4">
                    <h1 class="header-post-title-class">Overview</h1>
                    <div class="mt-3">
                        <p style="">
                            Redwood Peak is a Hong Kong-based asset manager focused on fund management and separate account management for high net worth individuals, family offices, and institutions. Redwood Peak Limited was founded in 2007 as the Chilton Investment Company (HK) Limited and was spun off in a management buyout on 1st July 2014. Redwood Peak is regulated by the Securities and Futures Commission of Hong Kong (Type 4 Advising on securities and Type 9 Asset Management license). We invest capital for clients through a Hedge Fund and Managed Account platforms.
                        </p>
                        <p style="">
                                Our investment process begins with identifying mispriced companies relative to their intrinsic value. In addition, we evaluate the quality and durability of a company’s business, the track record of a management team, and the underlying industry and macroeconomic trends. Redwood Peak’s investment edge is our extensive local network of relationships built over 45 years of combined investment experience. Our approach to portfolio construction involves risk assessment balanced with portfolio concentration versus diversification.
                        </p>
                        <h3 class="fancytitle">
                            <em>“Our paramount objective is to serve our client’s investment goals.”</em>
                        </h3>
                    </div>
                </div>
            </div>
        @include('footer')
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
