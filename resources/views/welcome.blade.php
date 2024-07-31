<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Redwood Peak Limited – Hong Kong based asset manager focused on fund & separate account management</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .icon-pdf::before {
            content: '\f1c1'; /* Example content for PDF icon, assuming using FontAwesome */
            font-family: 'FontAwesome';
            padding-right: 8px;
            font-size:36px;
            color:red
        }
       
        .elementor-icon-list-item a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }
        .elementor-icon-list-item .icon-pdf {
            margin-right: 10px;
            color: #d9534f; /* Red color for the PDF icon */
        }
        .meta-lists {
            margin-top: 5px;
            font-size: 0.9em;
            color: #888;
        }
        .meta-date i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        @include('header')
    </div>
    <div>
        <div id="carouselExampleIndicators" class="carousel slide">
            <!-- <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol> -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/slider_img1.jpg') }}" alt="Slide 1">
                </div>
                <!-- <div class="carousel-item">
                    <img src="https://via.placeholder.com/1600x600" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1600x600" alt="Slide 3">
                </div> -->
            </div>
            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>
        <!-- New Row of Three Columns -->
         <div class="container">
            <div class="row pt-0 mr-0 ml-0 row-padding">
                <div class="col-md-4 pr-0 pl-0">
                    <div class="card p-5" style="background-color:#04243d">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <h6 class="card-title text-white">22 OCTOBER 2023, 08.00 PM EDT</h6>
                            <h3 class="text-white">Smart investing strategies:<br> building wealth for the future</h3>
                            <!-- <button type="button" class="btn btn-secondary m-1">Register yourself now</button> -->
                        </div>
                        <div class="card-footer p-0 pt-3" style="background-color:#fff0 !important">
                        <button type="button" class="btn btn-primary">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mr-0 ml-0 pr-0 pl-0">
                    <div class="card p-5 card-bg-img">
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mr-0 ml-0 pr-0 pl-0">
                    <div class="card p-5" style="background-color:#fff">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <h6 class="card-title">News</h6>
                            <h3>Global Investment Trends:<br> Opportunities and Risks in 202</h3>
                            <h6 class="card-title">APRIL 3, 2022</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 ml-5 mr-5">
                <h5 class="text-center"> / Services</h5>
                <h4 class="pt-2">
                    Discover our expertise by <br /> learning what we offer
                </h4>
                <div class="mt-3 mb-5">
                <div class="row row-padding">
                    <div class="col-md-4">
                        <div class="card card-shadow">
                            <img src="{{ asset('assets/images/service_img1.jpg') }}" class="card-img-top" alt="Image 1">
                            <div class="card-body text-left">
                                <h5 class="card-title">Portfolio Management</h5>
                                <p class="card-text text-left p-0">
                                Cultivating change enthusiasts fuels success, resulting in superior, more efficient, and robust innovations.
                                </p>
                            </div>
                            <div class="card-footer text-left">
                            <button type="button" class="btn btn-primary">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-shadow">
                            <img src="{{ asset('assets/images/service_img2.jpg') }}" class="card-img-top" alt="Image 2">
                            <div class="card-body text-left">
                                <h5 class="card-title">Financial Planning</h5>
                                <p class="card-text text-left p-0">
                                Cultivating change enthusiasts fuels success, resulting in superior, more efficient, and robust innovations.
                                </p>
                            </div>
                            <div class="card-footer text-left">
                            <button type="button" class="btn btn-primary">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-shadow">
                            <img src="{{ asset('assets/images/service_img3.jpg') }}" class="card-img-top" alt="Image 3">
                            <div class="card-body text-left">
                                <h5 class="card-title">Wealth Management</h5>
                                <p class="card-text text-left p-0">
                                Cultivating change enthusiasts fuels success, resulting in superior, more efficient, and robust innovations.
                                </p>                   
                            </div>
                            <div class="card-footer text-left">
                            <button type="button" class="btn btn-primary">Learn More</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="mt-5 ml-5 mr-5">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="welcome-title-class">Our View</h1>
                        <div class="mt-3">
                            <ul>
                                <li>China Outlook Q1 2023</li>
                                <li>China Outlook Q4 2022</li>
                                <li>China Outlook Q3 2022</li>
                                <li>China Outlook Q2 2022</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="welcome-title-class">Latest News</h1>
                        <div class="mt-3">
                            <ul class="list-unstyled">
                                <li class="elementor-icon-list-item">
                                    <a href="{{ route('login') }}">
                                        <span class="icon-pdf"> </span>
                                        <div class="ekit_post_list_content_wraper">
                                            <span class="elementor-icon-list-text">Global Investment Trends: Opportunities and Risks in 2023</span>
                                            <div class="meta-lists">
                                                <span class="meta-date">
                                                    <i aria-hidden="true" class="icon icon-clock2"></i>	
                                                    03 Apr 2022	
                                                </span>		
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="elementor-icon-list-item">
                                    <a href="{{ route('login') }}">
                                        <span class="icon-pdf"></span>
                                        <div class="ekit_post_list_content_wraper">
                                            <span class="elementor-icon-list-text">Effective Asset Management Strategies for Sustainable Growth</span>
                                            <div class="meta-lists">
                                                <span class="meta-date">
                                                    <i aria-hidden="true" class="icon icon-clock2"></i>	
                                                    03 Apr 2022	
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="elementor-icon-list-item">
                                    <a href="{{ route('login') }}">
                                        <span class="icon-pdf"></span>
                                        <div class="ekit_post_list_content_wraper">
                                            <span class="elementor-icon-list-text">Tech Giants' Investment Plans in Artificial Intelligence Raise Eyebrows</span>
                                            <div class="meta-lists">
                                                <span class="meta-date">
                                                    <i aria-hidden="true" class="icon icon-clock2"></i>	
                                                    03 Apr 2022	
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="elementor-icon-list-item">
                                    <a href="{{ route('login') }}">
                                        <span class="icon-pdf"></span>
                                        <div class="ekit_post_list_content_wraper">
                                            <span class="elementor-icon-list-text">ESG Principles Transforming Investment Landscape: What You Need to Know</span>
                                            <div class="meta-lists">
                                                <span class="meta-date">
                                                    <i aria-hidden="true" class="icon icon-clock2"></i>	
                                                    03 Apr 2022	
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
