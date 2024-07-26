<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hedge Fund</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container-custom" id="page">
        @include('header')
        <div class="">
            <div>
                <img src="{{ asset('assets/images/investment_management1.png') }}" class="w-100" alt="Image 1">
            </div>
            <div class="container-custom mt-1 mb-5 p-4">
            <h1 class="header-post-title-class">Hedge Fund</h1>
                <div class="mt-3">
                    
                <p>
                    Redwood Peak Opportunities Fund (the “Fund”)* is an&nbsp;Equity, Long-Short Fund launched 
                    in January 2007, formerly known as the Chilton China Opportunities Fund.&nbsp;&nbsp;The 
                    Fund aims to produce superior investment returns throughout various market cycles by 
                    investing in companies located in or with exposure to the China region.&nbsp; Redwood 
                    Peak seeks capital appreciation during favorable market&nbsp;conditions while preserving 
                    capital in times of financial duress.&nbsp; The Fund uses a value approach and has a net 
                    long bias, but utilizes shorts for both alpha generation and hedging purposes.
                </p>
                <p>
                    The Fund’s research process is based upon bottom-up, fundamental analysis that typically 
                    targets companies with four main characteristics: high-quality management teams, strong 
                    business franchises, high barriers to entry through brand, scale or technology, and 
                    reasonable valuations. The Fund primarily invests in publicly traded equities but has 
                    the flexibility to invest in derivatives and other securities.
                </p>
                <p>
                    The Fund is only available to institutions, family offices and high net worth individuals who 
                    qualify as Professional Investors as defined by the Securities and Futures&nbsp;Commission.
                </p>
                <p>
                    <em>
                        * Please 
                        <a style="text-decoration: none; padding: 0; color: #823535; margin: 0;" 
                            href="../../contact-us/" 
                            target="self">
                            contact us
                        </a> 
                        or register for further details on the fund.
                    </em>
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
