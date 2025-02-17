<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media – Redwood Peak Limited</title>
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

        img,
        video {
            height: 100px !important;
            object-fit: cover;
        }

        /*  */
        .card {
            position: relative;
        }

        .card-body {
            display: block;
            text-align: center;
        }

        .edit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #007bff;
            /* Change to your preferred color */
        }

        .card:hover .edit-icon {
            display: block;
            /* Show the icon on hover */
        }

        /*  */
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.overview') }}">Users</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container-fluid main-content" id="main-content">
        <!-- Dashboard Content -->
        <div class="">
            <div class="d-flex justify-content-between mt-5 mb-5 bg-white p-3 shadow-sm">
                <h3 class="modal-title">Media</h3>
                <button data-toggle="modal" data-target="#uploadModal" class="btn btn-secondary">Add New Media File</button>
            </div>

            <!-- Filter Options -->
            <div class="d-flex justify-content-between mb-4 bg-white p-3 shadow-sm">
                <div>
                    <button class="btn btn-outline-secondary btn-sm filter-btn" data-filter="all">All</button>
                    <button class="btn btn-outline-secondary btn-sm filter-btn" data-filter="images">Images</button>
                    <button class="btn btn-outline-secondary btn-sm filter-btn" data-filter="videos">Videos</button>
                    <button class="btn btn-outline-secondary btn-sm filter-btn" data-filter="documents">Documents</button>
                    <button id="resetFilters" class="btn btn-outline-danger btn-sm mt-2 mt-md-0" disabled>Reset All Filters</button>
                </div>
                <!-- <div>
                    <input type="text" id="searchMedia" class="form-control form-control-sm" placeholder="Search media...">
                </div> -->
                <div>
                    <div class="input-group input-group-sm">
                        <input type="text" id="searchMedia" class="form-control" placeholder="Search media...">
                        <div class="input-group-append">
                            <button id="searchButton" class="btn btn-primary" type="button">Search</button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Static media items Display Start-->
            <div class="container">
                <div class="row p-2" id="mediaItems" style="background-color:#fff; border:1px solid #ccc; height: 400px; overflow-y: auto;">
                    <div class="col-md-3 media-item" data-type="images">
                        <div class="card mb-4">
                            <img src="{{ asset('assets/dummy_Assetes/service_img1.jpg') }}" class="card-img-top" alt="Image 1">
                            <div class="card-body">
                                <h5 class="card-title">Image 3</h5>
                                <button class="btn btn-danger btn-sm">View</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 media-item" data-type="images">
                        <div class="card mb-4">
                            <img src="{{ asset('assets/dummy_Assetes/service_img2.jpg') }}" class="card-img-top" alt="Image 2">

                            <div class="card-body">
                                <h5 class="card-title">Image 4</h5>
                                <button class="btn btn-danger btn-sm">View</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 media-item" data-type="videos">
                        <div class="card mb-4">

                            <video class="card-img-top" controls>
                                <source src="{{ asset('assets/dummy_Assetes/video.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <div class="card-body">
                                <h5 class="card-title">Video 2</h5>
                                <button class="btn btn-danger btn-sm">View</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 media-item" data-type="documents">
                        <div class="card mb-4">
                            <a href="http://127.0.0.1:8000/assets/dummy_Assetes/test2.pdf" target="_blank" class="card-img-top">
                                <img src="{{ asset('assets/dummy_Assetes/pdf.jpg') }}" alt="PDF" style="width: 100%;">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Document 2</h5>
                                <button class="btn btn-danger center btn-sm">View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static media items Display Close-->

            <!-- AttachMent Modal Structure -->
            <div class="modal fade" id="attachmentModal" tabindex="-1" role="dialog" aria-labelledby="attachmentModalLabel" aria-hidden="true" style="">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="attachmentModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pt-5 pb-5 ">
                            <div class="row pl-2 pr-3">
                                <div class="col-md-7">
                                    <img id="attachmentImage" src="" alt="" style="width: 100%; display: none; object-fit: contain;">
                                    <video id="attachmentVideo" controls style="width: 100%; display: none;">
                                        <source id="attachmentSource" src="" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <a id="attachmentLink" href="" target="_blank" style="display: none;">Download Document</a>
                                </div>
                                <div class="col-md-5">
                                    <strong>File URL:</strong>
                                    <p id="fileUrl" style="word-wrap: break-word;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AttachMent Modal Structure -->
            <!-- Upload Modal -->
            <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadModalLabel">Upload New Media</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="uploadForm" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="mediaFile">Select File</label>
                                    <input type="file" class="form-control-file" id="mediaFile" name="mediaFile" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="uploadButton">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Upload Modal Close-->
        </div>

        <!-- Bootstrap 4.5.2 JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
        <!-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const resetButton = document.getElementById('resetFilters');
                const filterButtons = document.querySelectorAll('.filter-btn');
                const mediaItems = document.querySelectorAll('.media-item');

                console.log("resetButton", resetButton)
                console.log("filterButtons", filterButtons)
                console.log("mediaItems", mediaItems)


                filterButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        resetButton.disabled = false; // Enable the reset button
                        filterButtons.forEach(btn => btn.classList.remove('active')); // Remove active state
                        button.classList.add('active'); // Add active state to the selected filter

                        // Filter media items
                        const filter = button.getAttribute('data-filter');
                        mediaItems.forEach(item => {
                            if (filter === 'all' || item.getAttribute('data-type') === filter) {
                                item.style.display = 'block';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });
                });

                // Reset Filters Button Action
                resetButton.addEventListener('click', function() {
                    resetButton.disabled = true; // Disable the reset button
                    filterButtons.forEach(btn => btn.classList.remove('active')); // Clear active state
                    mediaItems.forEach(item => item.style.display = 'block'); // Show all items
                    document.getElementById('searchMedia').value = ''; // Clear search input
                });

                // Search functionality
                document.getElementById('searchMedia').addEventListener('input', function() {
                    const query = this.value.toLowerCase();
                    mediaItems.forEach(item => {
                        const title = item.querySelector('.card-title').textContent.toLowerCase();
                        if (title.includes(query)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });

                // Handle Upload Button
                document.getElementById('uploadButton').addEventListener('click', function() {
                    const form = document.getElementById('uploadForm');
                    const formData = new FormData(form);
                    $('#uploadModal').modal('hide');
                });
            });
        </script> -->
        <!-- <script>
            $('.media-item').on('click', function() {
                const title = $(this).find('.card-title').text();
                const type = $(this).data('type');

                // Set the modal title
                $('#attachmentModalLabel').text(title);

                let fileUrl; // Variable to hold the file URL

                if (type === 'images') {
                    const imgSrc = $(this).find('img').attr('src');
                    $('#attachmentImage').attr('src', imgSrc).show();
                    $('#attachmentVideo').hide();
                    $('#attachmentLink').hide();
                    fileUrl = imgSrc; // Set the file URL for images
                } else if (type === 'videos') {
                    const videoSrc = $(this).find('video source').attr('src');
                    $('#attachmentSource').attr('src', videoSrc);
                    $('#attachmentVideo').show();
                    $('#attachmentImage').hide();
                    $('#attachmentLink').hide();
                    fileUrl = videoSrc; // Set the file URL for videos
                } else if (type === 'documents') {
                    const docLink = $(this).find('a').attr('href');
                    $('#attachmentLink').attr('href', docLink).show().text('Download Document');
                    $('#attachmentImage').hide();
                    $('#attachmentVideo').hide();
                    fileUrl = docLink; // Set the file URL for documents
                }

                // Display the file URL in the modal
                $('#fileUrl').text(fileUrl);

                // Show the modal
                $('#attachmentModal').modal('show');
            });
        </script> -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const resetButton = document.getElementById('resetFilters');
                const filterButtons = document.querySelectorAll('.filter-btn');
                const mediaItems = document.querySelectorAll('.media-item');
                const searchMediaInput = document.getElementById('searchMedia');
                const searchButton = document.getElementById('searchButton');

                function searchMedia() {
                    const query = searchMediaInput.value.toLowerCase();
                    mediaItems.forEach(item => {
                        const title = item.querySelector('.card-title').textContent.toLowerCase();
                        if (title.includes(query)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                }

                searchButton.addEventListener('click', function() {
                    searchMedia();
                });

                function filterMedia(type) {
                    console.log("types ==>",type)
                    mediaItems.forEach(item => {
                        if (type === 'all' || item.getAttribute('data-type') === type) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    const newUrl = type === 'all' ?`/list?mediaType=${type}` : `/list?mediaType=${type}`;
                    history.pushState(null, '', newUrl); 
                }

                filterButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        resetButton.disabled = false; 
                        filterButtons.forEach(btn => btn.classList.remove('active')); 
                        button.classList.add('active'); 
                        const filter = button.getAttribute('data-filter');
                        filterMedia(filter);
                    });
                });

                resetButton.addEventListener('click', function() {
                    resetButton.disabled = true; 
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    mediaItems.forEach(item => item.style.display = 'block'); 
                    searchMediaInput.value = ''; 
                    console.log("Default Url set")
                    history.pushState(null, '', '/media');
                });

                document.getElementById('uploadButton').addEventListener('click', function() {
                    const form = document.getElementById('uploadForm');
                    const formData = new FormData(form);
                    $('#uploadModal').modal('hide');
                });
            });

            $('.media-item').on('click', function() {
                const title = $(this).find('.card-title').text();
                const type = $(this).data('type');

                $('#attachmentModalLabel').text(title);

                let fileUrl;

                if (type === 'images') {
                    const imgSrc = $(this).find('img').attr('src');
                    $('#attachmentImage').attr('src', imgSrc).show();
                    $('#attachmentVideo').hide();
                    $('#attachmentLink').hide();
                    fileUrl = imgSrc; 
                } else if (type === 'videos') {
                    const videoSrc = $(this).find('video source').attr('src');
                    $('#attachmentSource').attr('src', videoSrc);
                    $('#attachmentVideo').show();
                    $('#attachmentImage').hide();
                    $('#attachmentLink').hide();
                    fileUrl = videoSrc; 
                } else if (type === 'documents') {
                    const docLink = $(this).find('a').attr('href');
                    $('#attachmentLink').attr('href', docLink).show().text('Download Document');
                    $('#attachmentImage').hide();
                    $('#attachmentVideo').hide();
                    fileUrl = docLink; 
                }

                $('#fileUrl').text(fileUrl);

                $('#attachmentModal').modal('show');
            });
        </script>



</body>

</html>