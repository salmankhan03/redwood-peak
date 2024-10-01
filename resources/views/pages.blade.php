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
    <div class="sidebar" id="sidebar">
        <h4 class="text-white text-center py-3">Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminDashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('media') }}">Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post') }}">Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages') }}">Pages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user') }}">Users</a>
            </li>
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
                <button id="performAction" class="btn btn-primary ml-3" onclick="redirectToCreatePage()">Upload New Document</button>
            </div>
            <div class="mb-3 mt-5 row d-flex justify-content-between">
                <div class="col-md-3 p-1">
                    <select id="tableActions" class="form-control" onchange="filterTable()">
                        <option value="">Table Action...</option>
                        <option value="Delete">Delete</option>
                    </select>
                </div>
                <div class="col-md-3 p-1">                   
                    <select id="postType" class="form-control" onchange="filterTable()">
                        <option value="">All Types</option>
                        <option value="Publications">Publications</option>
                        <option value="Hedge Fund Reports">Hedge Fund Reports</option>
                        <option value="Managed Account Reports">Managed Account Reports</option>
                    </select>
                </div>
                
                <div class="col-md-3 p-1">
                    <select id="postingYears" class="form-control" onchange="filterTable()">
                        <option value="">All Years</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div class="col-md-3 p-1">
                    <input type="text" id="searchPages" class="form-control form-control-sm" placeholder="Search post..." onkeyup="filterTable()">
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
                <tbody id="tableBody">
                    <tr>
                        <td><input type="checkbox" class="user-select"></td>
                        <td>China Outlook Q1 2023</td>
                        <td>Publications</td>
                        <td>2018</td>
                        <td><button class="btn btn-primary ml-3" onclick="redirectToCreatePage()">Edit</button></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="user-select"></td>
                        <td>Master Fund – Portfolio Summary June 2024</td>
                        <td>Hedge Fund Reports</td>
                        <td>2021</td>
                        <td><button class="btn btn-primary ml-3" onclick="redirectToCreatePage()">Edit</button></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="user-select"></td>
                        <td>Portfolio Summary – July 2024</td>
                        <td>Managed Account Reports</td>
                        <td>2021</td>
                        <td><button class="btn btn-primary ml-3" onclick="redirectToCreatePage()">Edit</button></td>
                    </tr>
                    <tr class="no-data" style="display: none;">
                        <td colspan="5">No user data available yet.</td>
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
    <script>
    
        function filterTable() {
            const typeFilter = document.getElementById('postType').value;
            const yearFilter = document.getElementById('postingYears').value;
            const searchInput = document.getElementById('searchPages').value.toLowerCase();
            const tableBody = document.getElementById('tableBody');
            const rows = tableBody.getElementsByTagName('tr');
            let hasData = false;

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const docTitle = row.cells[1].textContent.toLowerCase();
                const docType = row.cells[2].textContent;
                const docYear = row.cells[3].textContent;

                const typeMatch = typeFilter ? docType === typeFilter : true;
                const yearMatch = yearFilter ? docYear === yearFilter : true;
                const searchMatch = docTitle.includes(searchInput);

                if (typeMatch && yearMatch && searchMatch) {
                    row.style.display = '';
                    hasData = true;
                } else {
                    row.style.display = 'none';
                }
            }

            const noDataRow = tableBody.getElementsByClassName('no-data')[0];
            noDataRow.style.display = hasData ? 'none' : '';
        }
    </script>


</body>

</html>
