<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Managed Account Reports – Redwood Peak Limited</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .year-header {
            margin-top: 20px;
            color:#823535;
        }
        .pdf-row {
            padding: 8px;
            margin-bottom: 8px;
            
        }
        .pdf-title {
        }
    </style>
</head>
<body>
    <div class="container" id="page">
        @include('header')
    </div>
            <div>
                <img src="{{ asset('assets/images/banner_investor_resources.jpg') }}" class="bannerHeight" alt="Image 1">
            </div>
            <div class="container">
                <div class="container-custom mt-1 mb-5 p-4">
                    <h1 class="header-post-title-class" style="top:0px">Managed Account Reports</h1>
                    <div>
                        <!-- Year 2023 -->
                        <div id="year-2023">
                            <div class="year-header" onclick="toggleVisibility('year-2023')">China</div>
                            <div class="ml-5">
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        China Outlook Q1 2023
                                    </div>
                                </div>
                                                           
                            </div>
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
