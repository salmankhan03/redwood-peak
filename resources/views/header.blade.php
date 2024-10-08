<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Custom CSS for responsive navigation drawer */
        .drawer-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
        }
        .drawer-content {
            position: fixed;
            top: 0;
            left: 0;
            width: 80%;
            max-width: 300px;
            height: 100%;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 1050;
            overflow-y: auto;
        }
        .drawer-content.open {
            transform: translateX(0);
        }
        .nav-link:hover {
            color: #380000 !important;
        }
    
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; 
        }
        .dropdown-menu:hover {
            display: block;
            margin-top: 0; 
            
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light HeaderBGColor pl-4 pr-4 pt-3 pb-3">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('assets/images/logo.png') }}" class="d-inline-block align-top" alt="Logo" style="height:50px">
    </a>
    <button class="navbar-toggler mr-2 mt-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="margin-left:auto">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-container mt-3 ml-2">
            <ul class="navbar-nav navbarFontsSize">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown {{ Request::is('our-mission', 'overview', 'senior-team') ? 'active' : '' }}">
                    <a class="nav-link no-caret" href="#" id="aboutUsDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        About Us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="aboutUsDropdown">
                        <a class="dropdown-item" href="{{ route('ourMission') }}">Our Mission</a>
                        <a class="dropdown-item" href="{{ route('overView') }}">Overview</a>
                        <a class="dropdown-item" href="{{ route('seniorTeam') }}">Senior Team</a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ Request::is('hedge-fund', 'managed-account') ? 'active' : '' }}">
                    <a class="nav-link no-caret" href="#" id="investmentManagementDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Investment Management
                    </a>
                    <div class="dropdown-menu" aria-labelledby="investmentManagementDropdown">
                        <a class="dropdown-item" href="{{ route('hedgeFund') }}">Hedge Fund</a>
                        <a class="dropdown-item" href="{{ route('managedAccount') }}">Managed Account</a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('our-approach') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ourApproach') }}">Our Approach</a>
                </li>
                <li class="nav-item dropdown {{ Request::is('publicationUpdates') ? 'active' : '' }}">
                    <a class="nav-link no-caret" href="#" id="publicationUpdatesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Publication & Updates
                    </a>
                    <div class="dropdown-menu" aria-labelledby="publicationUpdatesDropdown">
                        <a class="dropdown-item" href="{{ route('publications') }}">Publications</a>
                        <a class="dropdown-item" href="{{ route('news') }}">News</a>
                        <a class="dropdown-item" href="{{ route('visits') }}">Visits</a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ Request::is('investorResources') ? 'active' : '' }}">
                    <a class="nav-link no-caret" href="#" id="investorResourcesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Investor Resources
                    </a>
                    <div class="dropdown-menu" aria-labelledby="investorResourcesDropdown">
                        <a class="dropdown-item" href="{{ route('hedgeFundReports') }}">Hedge Fund Reports</a>
                        <a class="dropdown-item" href="{{ route('managedAccountReports') }}">Managed Account Reports</a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('contact-us') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contactUs') }}">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sign-in-container mt-3">
        <button type="button" class="btn btn-primary" onclick="redirectToLogin()">Sign In</button>
    </div>
</nav>

<!-- Off-canvas navigation drawer -->
<div class="drawer-overlay"></div>
<div class="drawer-content">
    <ul class="navbar-nav navbarFontsSize">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('ourMission') }}">Our Mission</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('overView') }}">Overview</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('seniorTeam') }}">Senior Team</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('hedgeFund') }}">Hedge Fund</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('managedAccount') }}">Managed Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ourApproach') }}">Our Approach</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('publications') }}">Publications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">News</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Visits</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Hedge Fund Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Managed Account Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contactUs') }}">Contact Us</a>
        </li>
    </ul>
</div>

<script>
     let dropdownTimeout;

    document.querySelectorAll('.nav-item.dropdown').forEach(function(dropdown) {
        dropdown.addEventListener('mouseenter', function() {
            clearTimeout(dropdownTimeout);

        document.querySelectorAll('.nav-item.dropdown .dropdown-menu.show').forEach(function(openDropdown) {
            openDropdown.classList.remove('show');
        });

        dropdown.querySelector('.dropdown-menu').classList.add('show');
    });

    dropdown.addEventListener('mouseleave', function() {
        dropdownTimeout = setTimeout(function() {
            dropdown.querySelector('.dropdown-menu').classList.remove('show');
        }, 300); 
    });

    dropdown.querySelector('.dropdown-menu').addEventListener('mouseenter', function() {
        clearTimeout(dropdownTimeout);
    });

    dropdown.querySelector('.dropdown-menu').addEventListener('mouseleave', function() {
        dropdownTimeout = setTimeout(function() {
            dropdown.classList.remove('show');
        }, 300); 
    });
});

    $(document).ready(function() {
        $('.navbar-toggler').click(function() {
            $('.drawer-overlay').fadeToggle();
            $('.drawer-content').toggleClass('open');
        });

        $('.drawer-overlay').click(function() {
            $('.drawer-overlay').fadeOut();
            $('.drawer-content').removeClass('open');
        });
    });
    function redirectToLogin() {
        window.location.href = "{{ route('login') }}";
    }
</script>

</body>
</html>
