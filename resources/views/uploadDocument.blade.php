<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UploadDocument – Redwood Peak Limited</title>
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

    /* Upload Documnets */
        .upload-box {
            border: 2px dashed #007bff;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }
        .upload-box:hover {
            background-color: #f8f9fa;
        }
        .upload-box input[type="file"] {
            display: none;
        }
        .upload-button {
            margin-top: 10px;
        }
    /* Upload */
    

    </style>
     <style>
        
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
                    <!-- <div class="row mt-5">
                        <h3>Pages</h3>
                        <button id="performAction" class="btn btn-primary ml-3">Add New Pages</button>
                    </div> -->

                    <h2 class="mt-5 mb-3">Upload Documents</h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="mt-5 mb-5">
                        @csrf
                        <div class="form-group row">
                        <div class="col-md-4">
                            <label for="postType" class="col-form-label">Documents Type</label>
                            
                                <select id="postType" class="form-control">
                                    <option value="publications">Publications</option>
                                    <option value="hedgeFundReports">Hedge Fund Reports</option>
                                    <option value="managedAccountReports">Managed Account Reports</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                            <label for="postingYears" class="col-form-label">Posting Years</label>
                                <select id="postingYears" class="form-control">
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
                        </div>
                        <div class="upload-box mt-5 mb-5">
                            <label for="documentUpload" class="upload-label">
                                <h4>Drag and drop your PDF here or click to upload</h4>
                            </label>
                            <input type="file" id="documentUpload" class="form-control" accept="application/pdf">
                            <div class="upload-button">
                                <button class="btn btn-primary" onclick="document.getElementById('documentUpload').click();">Select PDF</button>
                            </div>
                            <small class="form-text text-muted">Only PDF files are allowed.</small>
                        </div>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </form>                
                </div>    
    </div>

    <!-- Bootstrap 4.5.2 JS and dependencies -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
        // Optional: Add drag-and-drop functionality
        const uploadBox = document.querySelector('.upload-box');
        const fileInput = document.getElementById('documentUpload');

        uploadBox.addEventListener('dragover', (event) => {
            event.preventDefault();
            uploadBox.classList.add('drag-over');
        });

        uploadBox.addEventListener('dragleave', () => {
            uploadBox.classList.remove('drag-over');
        });

        uploadBox.addEventListener('drop', (event) => {
            event.preventDefault();
            const files = event.dataTransfer.files;
            if (files.length) {
                fileInput.files = files; // Set the input's files
                uploadBox.querySelector('h4').textContent = files[0].name; // Display file name
            }
            uploadBox.classList.remove('drag-over');
        });
    </script>

</body>

</html>
