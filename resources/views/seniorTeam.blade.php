<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Senior Team</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container-custom" id="page">
    @include('header')

        <!-- New Row of Three Columns -->
        <div class="">
            <div>
                <img src="{{ asset('assets/images/our_mission.jpg') }}" class="w-100" alt="Image 1">
            </div>
            <div class="container-custom mt-1 mb-5 p-4">
            <h1 class="header-post-title-class">Senior Team</h1>
                <div class="mt-3">
                    
                <p>
                    <strong>
                        <span style="color: #823535;">
                            Kenneth Chiang, CFA – Managing Partner &amp; Chief Investment Officer
                        </span>
                    </strong><br>
                    Mr. Chiang is the Managing Partner, Chief Investment Officer and founder of Redwood Peak. 
                    On July 1, 2014, Redwood Peak purchased 100% of Chilton Investment Company’s interest in 
                    its wholly-owned Hong Kong Subsidiary, Chilton Investment Company (HK) Ltd. where 
                    Mr. Chiang was Managing Director and Portfolio Manager of the Chilton China 
                    Opportunities Fund since 2007. Mr. Chiang has over 20 years of investment experience, 
                    with a proven record of outperformance in the industry. He has received numerous 
                    prestigious nominations and awards and has been recognized as a leading global investor. 
                    Before joining Chilton, Mr. Chiang spent 7 years at Merrill Lynch as a Managing Director 
                    and Portfolio Manager of the Merrill Lynch Global Small Cap Fund. Prior to that, 
                    Mr. Chiang was a Managing Partner at Samuel Asset Management for one year, and 
                    before that worked for 6 years at Merrill Lynch as the Co-Manager of the Emerging 
                    Market Fund. Mr. Chiang received a B.A. in Political Science from Stanford 
                    University and an M.B.A. from the Wharton School.
                </p>
                <p>
                    <strong>
                        <span style="color: #823535;">
                            David Lee – Managing Director, Research
                        </span>
                    </strong><br>
                    David Lee is a Managing Director -Research at Redwood Peak. Mr. Lee has over 
                    20 years of investing in Global EM &amp; Asia equity markets. &nbsp;Before 
                    joining Redwood Peak, Mr. Lee was the CIO at Samsung Asset Management 
                    HK. &nbsp;He was also the Asia Equity PM at The Rohatyn Group (TRG) in New 
                    York, an EM multi asset hedge fund in NYC. &nbsp;Prior to that, Mr. Lee 
                    was the Lead PM for Lazard Asset Management’s Global EM fund in NYC. 
                    &nbsp;Mr. Lee received his BSE from the Wharton School at the 
                    University of Pennsylvania, and an M.B.A. from UCLA Anderson School 
                    of Management.
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
