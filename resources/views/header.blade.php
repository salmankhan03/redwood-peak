    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Header</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- <style>
            .HeaderBGColor{
                background-color: #f1eee8 !important;

            }
                .navbar-nav .nav-item:hover .dropdown-menu {
                display: block;
            }
            .nav-link.no-caret::after {
                display: none;
            }
            .navbarFontsSize {
                font-size: 13px;
            }
            .navbar-nav .nav-item {
                position: relative;
            }
            .navbar-nav .nav-item:not(:last-child)::after {
                content: '|';
                position: absolute;
                right: 0px; 
                top: 50%;
                transform: translateY(-50%);
                color: #000;
            }
            .navbar-container {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
            }
            .form-row {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 0px; 
                margin-right:0px !important;
                padding-right:0px !important;
                width: 220px;
            }
            .form-group {
                display: flex;
                flex-direction: row;
            }
            .form-group input {
                margin-bottom: 0px;
                width: 100px;
            }
            .form-group button {
                width: 100px;
                border-radius: 4px !important;

            }
        </style> -->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light HeaderBGColor pl-4 pr-4 pt-3 pb-3">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/logo.png') }}" class="d-inline-block align-top" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-container w-100">
                    <div class="form-row">
                        <div class="form-group mb-1">
                            <input type="email" class="form-control m-1" placeholder="Email address">
                            <input type="password" class="form-control m-1" placeholder="Password">

                        </div>
                        <div class="form-group mb-1">
                            <button type="button" class="btn btn-primary m-1">Go</button>
                            <button type="button" class="btn btn-secondary m-1" onclick="redirectToRegister()">Register</button>
                        </div>
                        <div>
                            <!-- <a href="#" class=""> -->
                            <p>
                            Forgot your password?</p>
                        </div>
                    </div>

                    <!-- Second row: Navbar items -->
                    <ul class="navbar-nav navbarFontsSize">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link no-caret" href="#" id="aboutUsDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                About Us
                            </a>
                            <div class="dropdown-menu" aria-labelledby="aboutUsDropdown">
                                <!-- <a class="dropdown-item" href="#">Our Mission</a> -->
                                <a class="dropdown-item" href="{{ route('ourMission') }}">Our Mission</a>
                                <a class="dropdown-item" href="{{ route('overView') }}">Overview</a>
                                <a class="dropdown-item" href="{{ route('seniorTeam') }}">Senior Team</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link no-caret" href="#" id="investmentManagementDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Investment Management
                            </a>
                            <div class="dropdown-menu" aria-labelledby="investmentManagementDropdown">
                                <a class="dropdown-item" href="{{ route('hedgeFund') }}">Hedge Fund</a>
                                <a class="dropdown-item" href="{{ route('managedAccount') }}">Managed Account</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ourApproach') }}">Our Approach</a>
                        </li>   
                        <li class="nav-item dropdown">
                            <a class="nav-link no-caret" href="#" id="publicationUpdatesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Publication & Updates
                            </a>
                            <div class="dropdown-menu" aria-labelledby="publicationUpdatesDropdown">
                                <a class="dropdown-item" href="#">Publications</a>
                                <a class="dropdown-item" href="#">News</a>
                                <a class="dropdown-item" href="#">Visits</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Investor Resources</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link no-caret" href="#" id="investorResourcesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Investor Resources
                            </a>
                            <div class="dropdown-menu" aria-labelledby="investorResourcesDropdown">
                                <a class="dropdown-item" href="#">Hedge Fund Reports</a>
                                <a class="dropdown-item" href="#">Managed Account Reports</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactUs') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script>
        function redirectToRegister() {
            window.location.href = '{{ route('register') }}'; 
        }
    </script>
    </body>
    </html>
