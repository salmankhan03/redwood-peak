<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard – Redwood Peak Limited</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">

    <!-- Bootstrap 4.5.2 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #f0f2f5;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding: 15px;
            position: fixed;
            top: 0;
            left: -250px; /* Initially hide the sidebar */
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar.show {
            left: 0; /* Slide the sidebar in on mobile devices */
        }

        .sidebar .nav-item a {
            color: #ffffff;
            margin: 10px 0;
        }

        .sidebar .nav-item a:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        /* Main Content Styles */
        .main-content {
            padding: 20px;
            width: 100%;
            margin-left: 0;
            transition: all 0.3s ease;
        }

        /* Adjust main content margin when sidebar is shown */
        .main-content.shifted {
            margin-left: 250px; /* Space for sidebar on larger screens */
        }

        /* Navbar Styles */
        .navbar {
            width: 100%;
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }

        .navbar .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Show Sidebar and Shift Content on Larger Screens */
        @media (min-width: 769px) {
            .sidebar {
                left: 0; /* Show sidebar by default */
            }

            .main-content {
                margin-left: 250px; /* Adjust main content space */
            }
        }

        /* Hide Content Shift on Mobile */
        @media (max-width: 768px) {
            .main-content.shifted {
                margin-left: 0; /* Remove margin shift on mobile */
            }
        }

        /* Cards */
        .card {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .count {
            font-weight: bold;
            color: #007bff;
        }

        .warning {
            color:red;
        }

        .table a {
            text-decoration: none;
        }

        .table td {
            padding: 10px;
            vertical-align: middle;
            border-top:none !important;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #FFF;
        }
        /* Cards */
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h4 class="text-white text-center py-3">Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Appearance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Plugins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tools</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">My Admin</a>
            <button class="navbar-toggler" type="button" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container-fluid mt-5">
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Users Overview</h2>
                </div>
                <div class="card-body">
                    <table id="um-users-overview-table" class="table table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="all">
                                            500
                                        </a>
                                        <a href="#" class="filter-link" data-status="all">Users</a>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="pending">
                                            100
                                        </a>
                                        <a href="#" class="filter-link" data-status="pending">Pending Review</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="approved">
                                            200
                                        </a>
                                        <a href="#" class="filter-link" data-status="approved">Approved</a>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="awaiting_email_confirmation">
                                            50
                                        </a>
                                        <a href="#" class="filter-link" data-status="awaiting_email_confirmation">Awaiting Email Confirmation</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="rejected">
                                            50
                                        </a>
                                        <a href="#" class="filter-link" data-status="rejected">Rejected</a>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="inactive">
                                            10
                                        </a>
                                        <a href="#" class="filter-link" data-status="inactive">Inactive</a>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="users-list-container">
                <!-- This is where the user list will be loaded -->
            </div>
        </div>
    </div>

    <!-- Bootstrap 4.5.2 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Toggle Sidebar Functionality for Mobile
        document.querySelector('.navbar-toggler').addEventListener('click', function () {
            const sidebar = document.querySelector('#sidebar');
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside (for mobile)
        document.addEventListener('click', function (event) {
            const sidebar = document.querySelector('#sidebar');
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickInsideToggler = document.querySelector('.navbar-toggler').contains(event.target);

            if (!isClickInsideSidebar && !isClickInsideToggler) {
                sidebar.classList.remove('show');
            }
        });
    </script>
   
</body>

</html>
