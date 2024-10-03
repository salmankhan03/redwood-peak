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
                <a class="nav-link" href="{{ route('pages') }}">pages</a>
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
                    <!-- <div class="row mt-5">
                        <h3>post</h3>
                        <button id="performAction" class="btn btn-primary ml-3">Add New Pages</button>
                    </div> -->

                    <h2 class="mt-5 mb-4">Create New Post</h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form >
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="postCategories">Choose PostCategories</label>
                            <select id="postCategories" class="form-control">
                                <option value="">All Categories</option>
                                <!-- <option value="article">Article</option>
                                <option value="enews">Enews</option>
                                <option value="latestNews">Latest News</option> -->
                                <option value="news">News</option>
                                <!-- <option value="uncategorized">Uncategorized</option> -->
                                <option value="visit">Visit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Select Post Thumbnail</label>
                            <div class="upload-box ">
                                <label for="documentUpload" class="upload-label">
                                    <h4>Drag and drop your Post Thumbnail Image here or click to upload</h4>
                                </label>
                                <input type="file" id="documentUpload" class="form-control" accept="image/jpeg, image/png">
                                <div class="upload-button">
                                    <button class="btn btn-primary" onclick="document.getElementById('documentUpload').click();">Select Image</button>
                                </div>
                                <small class="form-text text-muted">Only JPEG/JPG and PNG are allowed.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content">Post Content</label>
                            <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
                        </div>

                            <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>

                   
                </div>

              
    </div>

    <!-- Bootstrap 4.5.2 JS and dependencies -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        // Initialize CKEditor
        CKEDITOR.replace('content', {
            toolbar: [
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'Undo', 'Redo'] },
                { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
                { name: 'styles', items: ['Styles', 'Format'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
                { name: 'colors', items: ['TextColor', 'BGColor'] }
            ],
            height: 300
        });

        // Handle the button click
        document.getElementById('createPostButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Get the CKEditor data
            const postContent = CKEDITOR.instances.content.getData();
            
            // Log the content to the console
            console.log(postContent);

            // Optionally, store the content in local storage
            localStorage.setItem('postContent', postContent);
            
            // Redirect to another screen (optional)
            window.location.href = 'anotherPage.html'; // Change to your target page
        });
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
        document.getElementById('documentUpload').addEventListener('change', function() {
            const file = this.files[0];
            
            if (file) {
                const fileType = file.type;
                const validTypes = ['image/jpeg', 'image/png'];

                if (!validTypes.includes(fileType)) {
                    alert('Invalid file type. Please upload a JPEG or PNG image.');
                    this.value = ''; // Clear the input
                }
            }
        });
    </script>


</body>

</html>
