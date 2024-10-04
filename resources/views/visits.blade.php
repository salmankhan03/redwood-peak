<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Visits – Redwood Peak Limited</title>
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
            <img src="{{ asset('assets/images/banner_news.png') }}" class="customnBannerHeight" alt="News Banner">
        </div>
        <div class="container">
            <div class="container-custom mt-1 mb-5 p-4">
                <h1 class="header-post-title-class" style="top:0px">Visits</h1>
                <div class="row">
                    <div class="col-md-3">
                        <div>
                            <!-- Year 2023 -->
                            <div id="year-2023" class="mt-3 mb-4">
                                <div class="year-header" onclick="toggleVisibility('year-2023')">2023</div>
                                <div class="mt-4">
                                    <div class="pdf-row mb-3" onclick="updateContent('2023-1')">
                                        <div class="pdf-title row">
                                            <div class="col-md-9">
                                                Sunshine Action for elderly people
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pdf-row mb-3" onclick="updateContent('2023-2')">
                                        <div class="pdf-title row">
                                            <div class="col-md-3">
                                                <img src="{{ asset('assets/images/news2.png') }}" alt="Image 2" style="width:50px">
                                            </div>
                                            <div class="col-md-9">
                                                Sunshine Action for hundreds of homeless people
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Year 2022 -->
                            <div id="year-2022" class="mt-3 mb-3">
                                <div class="year-header" onclick="toggleVisibility('year-2022')">2022</div>
                                <div class="mt-4">
                                    <div class="pdf-row mb-3" onclick="updateContent('2022-1')">
                                        <div class="pdf-title row">
                                            <div class="col-md-3">
                                                <img src="{{ asset('assets/images/news3.jpeg') }}" alt="Image 3" style="width:50px">
                                            </div>
                                            <div class="col-md-9">
                                                Redwood Peak Volunteers with Sunshine Action to Distribute Food to the Homeless
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="mt-5">
                            <!-- News Content Render -->
                            <div id="contentDisplay"></div>
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
        const contentMap = {
            '2023-1': '<h2>Sunshine Action for Elderly People</h2><p>This program focuses on providing assistance and companionship to elderly individuals in our community.</p>',
            '2023-2': '<h2>Sunshine Action for the Homeless</h2><p>This initiative aims to provide meals and shelter to hundreds of homeless individuals.</p>',
            '2022-1': '<h2>Redwood Peak Volunteers</h2><p>This organization collaborates with Sunshine Action to distribute food to the homeless, ensuring no one goes hungry.</p>',
        };

        function updateContent(key) {
            const postContent = contentMap[key] || '<p>No content available.</p>';
            document.getElementById('contentDisplay').innerHTML = postContent;
        }

        // Optional: Load initial content when the page loads
        window.onload = function() {
            // Load default content (first item)
            updateContent('2023-1');
        };
    </script>
</body>
</html>
