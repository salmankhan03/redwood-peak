<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages – Redwood Peak Limited</title>
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
        /* Sidebar Styles */

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
                <a class="nav-link" href="{{ route('user') }}">Users</a>
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
    <div class="main-content" id="main-content">
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
                <div class="container-fluid">
                    <div class="row mt-5">
                        <!-- <h3>Pages</h3> -->
                        <button id="performAction" class="btn btn-primary ml-3" onclick="redirectToCreatePage()">Upload New Document </button>
                    </div>

                    <div class="mb-3 mt-5 row d-flex justify-content-between">
                        <div class="p-1">
                            <select id="tableActions" class="form-control">
                                <option value="">Table Action...</option>
                                <option value="Delete">Delete</option>
                            </select>    
                        </div>                    
                        <div>
                            <input type="text" id="searchPages" class="form-control form-control-sm" placeholder="Search pages...">
                        </div>
                    </div>
                    <table class="table table-striped" id="user-data-table" style="border:1px solid #ccc">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all" /></th>
                                <th>Documents Title</th>
                                <th>Documents Types</th>
                                <th>Years</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" class="user-select" data-username="user1"></td>
                                <td>Redwood Peak – China Outlook Q1 2023</td>
                                <td>Publications</td>
                                <td>2018</td>
                                <td><button id="performAction" class="btn btn-primary ml-3" onclick="redirectToCreatePage()">Edit</button></td>

                            </tr>
                            <tr>
                                <td><input type="checkbox" class="user-select" data-username="user2"></td>
                                <td>Redwood Peak Opportunities Master Fund – Portfolio Summary June 2024</td>
                                <td>Hedge Fund Reports</td>
                                <td>2021</td>
                                <td><button id="performAction" class="btn btn-primary ml-3" onclick="redirectToCreatePage()">Edit</button></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="user-select" data-username="user2"></td>
                                <td>Redwood Peak China – Portfolio Summary – July 2024 </td>
                                <td>Managed Account Reports</td>
                                <td>2021</td>
                                <td><button id="performAction" class="btn btn-primary ml-3" onclick="redirectToCreatePage()">Edit</button></td>
                            </tr>
                           
                           
                            <tr>
                                <td colspan="7">No user data available yet.</td>
                            </tr>
                        </tbody>
                    </table>       
                </div>

              
    </div>

    <!-- Bootstrap 4.5.2 JS and dependencies -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        function redirectToCreatePage() {
            window.location.href = "{{ route('uploadDocument') }}";
        }
    </script>
            
    <!-- Header Script -->
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
    <!-- Header Script -->


</body>

</html>