<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserList – Redwood Peak Limited</title>
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
            left: -250px;
            /* Initially hide the sidebar */
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar.show {
            left: 0;
            /* Slide the sidebar in on mobile devices */
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
            margin-left: 250px;
            /* Space for sidebar on larger screens */
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
                left: 0;
                /* Show sidebar by default */
            }

            .main-content {
                margin-left: 250px;
                /* Adjust main content space */
            }
        }

        /* Hide Content Shift on Mobile */
        @media (max-width: 768px) {
            .main-content.shifted {
                margin-left: 0;
                /* Remove margin shift on mobile */
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
            color: red;
        }

        .table a {
            text-decoration: none;
        }

        .table td {
            padding: 10px;
            vertical-align: middle;
            border-top: none !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #FFF;
        }

        /* Cards */
        .clear {
            clear: both;
        }

        #users-list-container {
            display: none;
        }

        /* Modal */
        /* Sticky header */
        .modal-header {
            position: sticky;
            top: 0;
            z-index: 1030;
            /* Bootstrap's z-index for modals */
            background-color: white;
            /* Ensure it stands out */
            border-bottom: 1px solid #dee2e6;
            /* Match Bootstrap's border style */
        }

        /* Set modal body height */
        .modal-body {
            max-height: 400px;
            /* Set desired height */
            overflow-y: auto;
            /* Enable scrolling */
        }

        /* Modal */
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h4 class="text-white text-center py-3">Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminDashboard') }}">Dashboard</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Posts</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('media') }}">Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post') }}">Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages') }}">Pages</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Appearance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Plugins</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.overview') }}">Users</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Tools</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li> -->
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container-fluid main-content" id="main-content">
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

        @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif

        @if(Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif

        <!-- Dashboard Content -->
        <div class="container mt-5">
    <button id="back-to-overview" class="btn btn-secondary mb-3">Back to Overview</button>

    <h1>Showing {{ ucfirst($status) }} Users</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Posts</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['username'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['role'] }}</td>
                    <td>{{ $user['posts'] }}</td>
                    <td>{{ $user['status'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>



    </div>

    <!-- Bootstrap 4.5.2 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Header Script -->
    <script>
        // Toggle Sidebar Functionality for Mobile
        document.querySelector('.navbar-toggler').addEventListener('click', function() {
            const sidebar = document.querySelector('#sidebar');
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside (for mobile)
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('#sidebar');
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickInsideToggler = document.querySelector('.navbar-toggler').contains(event.target);

            if (!isClickInsideSidebar && !isClickInsideToggler) {
                sidebar.classList.remove('show');
            }
        });
    </script>
    <!-- Header Script -->
    <script>
        document.getElementById('back-to-overview').addEventListener('click', function() {
            window.location.href = "{{ route('admin.user.overview') }}"; // Redirect back to the overview page
        });
    </script>

</body>

</html>
