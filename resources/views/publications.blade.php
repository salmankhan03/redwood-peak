<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Publications – Redwood Peak Limited</title>
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
                <img src="{{ asset('assets/images/banner_publications.jpg') }}" class="w-100 bannerHeight" alt="Image 1">
            </div>
            <div class="container">
                <div class="container-custom mt-1 mb-5 p-4">
                    <h1 class="header-post-title-class" style="top:0px">Publications</h1>
                    <div>
                        <!-- Year 2023 -->
                        <div id="year-2023">
                            <div class="year-header" onclick="toggleVisibility('year-2023')">2023</div>
                            <div class="ml-5">
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        China Outlook Q1 2023
                                    </div>
                                </div>
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        China Outlook Q2 2023
                                    </div>
                                </div>
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        Test Summary – July 2023
                                    </div>
                                </div>
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        Testing Summary – July 2023
                                    </div>
                                </div>                              
                            </div>
                        </div>

                        <!-- Year 2022 -->
                        <div id="year-2022">
                            <div class="year-header" onclick="toggleVisibility('year-2022')">2022</div>
                            <div class="ml-5">
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        China Outlook Q4 2022
                                    </div>
                                </div>
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        China Outlook Q5 2022
                                    </div>
                                </div>
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        China Outlook Q6 2022
                                    </div>
                                </div>
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        China Outlook Q7 2022
                                    </div>
                                </div>                              
                            </div>
                        </div>

                        <!-- Year 2021 -->
                        <div id="year-2021">
                            <div class="year-header" onclick="toggleVisibility('year-2021')">2021</div>
                            <div class="ml-5">
                                <div class="pdf-row">
                                    <div class="pdf-title">
                                        <span>
                                            <img src="{{ asset('assets/images/pdf_icon1.png') }}" alt="Image 1">
                                        </span>
                                        China Outlook Q8 2021
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
        function toggleVisibility(yearId) {
            const allYears = ['year-2021', 'year-2022', 'year-2023'];
            const yearDiv = document.getElementById(yearId);
            const pdfRows = yearDiv.getElementsByClassName('pdf-row');

            // Hide all years and show only the selected one
            for (let i = 0; i < allYears.length; i++) {
                const currentDiv = document.getElementById(allYears[i]);
                const currentPdfRows = currentDiv.getElementsByClassName('pdf-row');
                
                // Hide the PDF rows of the current year
                for (let j = 0; j < currentPdfRows.length; j++) {
                    currentPdfRows[j].style.display = 'none';
                }
            }

            // Show the selected year's PDFs
            for (let i = 0; i < pdfRows.length; i++) {
                pdfRows[i].style.display = 'block';
            }
        }
    </script>
</body>
</html>
