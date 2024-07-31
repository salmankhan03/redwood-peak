<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Our Approach</title>
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
                <img src="{{ asset('assets/images/about-slider.jpg') }}" class="w-100 bannerHeight" alt="Image 1">
            </div>
            <div class="container">
                <div class="container-custom mt-1 mb-5 p-4">
                    <h1 class="header-post-title-class">Our Approach</h1>
                    <div class="mt-3">                    
                        <p>
                            Our investment process begins with identifying mispriced companies relative to their 
                            intrinsic value. The investment team internally generates research ideas by 
                            identifying high quality companies through meetings and screening 
                            securities.&nbsp;Using our extensive local network we meet managements, 
                            industry experts and assess&nbsp;a company’s ability to generate superior returns. 
                            We look for high quality managements who know how to run their companies well, and 
                            understand how to generate a cash return on capital above their cost of capital. 
                            We look for businesses which demonstrate strong competitive advantages through 
                            high barriers to entry, including technological, cost, brand or 
                            distribution&nbsp;advantages. Finally, we&nbsp;like to buy companies at a discount 
                            and we aim to invest in companies&nbsp;where we can see 50% upside to their 
                            intrinsic value. Analysts make written and oral recommendations which the 
                            portfolio manager weighs based on the level of conviction and risk to the 
                            overall portfolio. The investment team continues to monitor progress in 
                            portfolio companies while the portfolio manager in conjunction with the 
                            risk manager monitors overall portfolio risk.
                        </p>
                        <p class="text-center mt-5 mb-5">
                            <img 
                                decoding="async" 
                                class="aligncenter size-full wp-image-2037 w-100" 
                                src="https://www.redwoodpeak.com/wp-content/uploads/2015/04/risk_management.png" 
                                alt="investment-approach">
                        </p>
                    </div>
                </div>
            </div>
        @include('footer')
    
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
