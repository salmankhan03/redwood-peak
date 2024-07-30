<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Managed Account</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
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
            <h1 class="header-post-title-class">Managed Account</h1>
                <div class="mt-3">
                    
                <p>
                    Leveraging on our research and investment capabilities, we provide managed 
                    account services. We partner with our clients and customize the investment 
                    strategy to achieve their unique investment goals. Our platform allows 
                    us to offer high quality and tailored investment and advisory services. 
                    Investors have engaged us to manage a combination of these portfolios:
                </p>
                <ol>
                    <li>
                        China Portfolio – A concentrated China-focused portfolio of up to 15 
                        high-quality companies which have long-term capital appreciation potential.
                    </li>
                    <li>
                        Sequoia Portfolio – A concentrated global portfolio of up to 25 high-quality 
                        companies which have long-term capital appreciation potential.
                    </li>
                    <li>
                        Sprout Portfolio – A&nbsp;diversified global portfolio of up to 30 high 
                        return small cap companies which have the potential for capital appreciation.
                    </li>
                    <li>
                        Offshore Dividend Income Portfolio – A diversified global portfolio of up 
                        to 30 income producing, steady cash flow and dividend generating companies 
                        providing an average gross yield (before taxes) of&nbsp;greater than 5%.
                    </li>
                </ol>
                <p>
                    <em>* Please&nbsp;
                        <a style="text-decoration: none; padding: 0; color: #823535; margin: 0;" 
                            href="../../contact-us/" target="self">contact us</a>
                        &nbsp;or register for further details on the managed account.
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
