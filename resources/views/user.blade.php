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
        .clear { clear: both; }
        #users-list-container { display: none; }

        /* Modal */
        /* Sticky header */
            .modal-header {
                position: sticky;
                top: 0;
                z-index: 1030; /* Bootstrap's z-index for modals */
                background-color: white; /* Ensure it stands out */
                border-bottom: 1px solid #dee2e6; /* Match Bootstrap's border style */
            }

            /* Set modal body height */
            .modal-body {
                max-height: 400px; /* Set desired height */
                overflow-y: auto; /* Enable scrolling */
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
                <a class="nav-link" href="{{ route('pageCreate') }}">Pages</a>
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
            <div class="card mb-4" id="users-overview-card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Users Overview</h2>
                    <span>
                        <button id="open-add-user-modal" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
                    </span>
                </div>
                <div class="card-body">
                    <table id="um-users-overview-table" class="table table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="all">500</a>
                                        <a href="#" class="filter-link" data-status="all">Users</a>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="pending">100</a>
                                        <a href="#" class="filter-link" data-status="pending">Pending Review</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="approved">200</a>
                                        <a href="#" class="filter-link" data-status="approved">Approved</a>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="awaiting_email_confirmation">50</a>
                                        <a href="#" class="filter-link" data-status="awaiting_email_confirmation">Awaiting Email Confirmation</a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="rejected">50</a>
                                        <a href="#" class="filter-link" data-status="rejected">Rejected</a>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <a class="count" href="#" data-status="inactive">10</a>
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
                <div id="user-list-content">
                    <!-- <h3>User List</h3> -->
                    <div class="mb-3 row align-items-center">
                        <div class="col-md-4">
                            <select id="userRoleFilter" class="form-control">
                                <option value="">Change role to...</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Editor">Editor</option>
                                <option value="Author">Author</option>
                                <option value="Contributor">Contributor</option>
                                <option value="Subscriber">Subscriber</option>
                                <option value="redwoodStaff">Redwood Staff</option>
                                <option value="redwoodAdmin">Redwood Admin</option>
                                <option value="Investor">Investor</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="userAction" class="form-control">
                                <option value="">User Action</option>
                                <option value="approve">Approve Membership</option>
                                <option value="reject">Reject Membership</option>
                                <option value="pending">Put as Pending Review</option>
                                <option value="resend">Resend Activation Email</option>
                                <option value="deactivate">Deactivate</option>
                                <option value="reactivate">Reactivate</option>
                            </select>
                        </div>
                        <div class="col-md-4 d-flex justify-content-between">
                            <button id="performAction" class="btn btn-primary me-1">Perform Action</button>
                            <button id="close-users-list" class="btn btn-secondary">X</button>
                        </div>
                    </div>
                    <table class="table table-striped" id="user-data-table" style="border:1px solid #ccc">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all" /></th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Posts</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" class="user-select" data-username="user1"></td>
                                <td>user1</td>
                                <td>User One</td>
                                <td>user1@example.com</td>
                                <td>Administrator</td>
                                <td>10</td>
                                <td>Approved</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="user-select" data-username="user2"></td>
                                <td>user2</td>
                                <td>User Two</td>
                                <td>user2@example.com</td>
                                <td>Editor</td>
                                <td>5</td>
                                <td>Pending</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="user-select" data-username="user3"></td>
                                <td>user3</td>
                                <td>User Three</td>
                                <td>user3@example.com</td>
                                <td>Subscriber</td>
                                <td>2</td>
                                <td>Rejected</td>
                            </tr>
                            <tr>
                                <td colspan="7">No user data available yet.</td>
                            </tr>
                        </tbody>
                    </table>

                     <!-- Pagination Controls -->
                     <nav aria-label="User Pagination">
                        <ul class="pagination justify-content-center"></ul>
                    </nav>
                    <!-- Pagination Controls -->
                </div>
            </div>

            <!-- Add User Modal -->
                <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addUserForm">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select id="role" class="form-control" required>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Editor">Editor</option>
                                            <option value="Author">Author</option>
                                            <option value="Contributor">Contributor</option>
                                            <option value="Subscriber">Subscriber</option>
                                            <option value="redwoodStaff">Redwood Staff</option>
                                            <option value="redwoodAdmin">Redwood Admin</option>
                                            <option value="Investor">Investor</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" required>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="sendEmail">
                                        <label class="form-check-label" for="sendEmail">Send User Notification</label>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="submitAddUser" class="btn btn-primary">Add User</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Add User Modal -->



            <!-- Add User Modal -->
        </div>
    </div>

    <!-- Bootstrap 4.5.2 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <!-- Tables Script -->
        <script>
            const userData = {
                all: [
                    { username: 'u1', name: 'User1', email: 'test@gmail.com', role: 'Administrator', posts: 0, status: 'approved' },
                    { username: 'u2', name: 'User2', email: 'user2@example.com', role: 'Editor', posts: 2, status: 'pending' },
                    { username: 'u3', name: 'User3', email: 'user3@example.com', role: 'Contributor', posts: 5, status: 'approved' },
                    { username: 'u4', name: 'User4', email: 'user4@example.com', role: 'Subscriber', posts: 1, status: 'rejected' },
                    { username: 'u5', name: 'User5', email: 'user5@example.com', role: 'Subscriber', posts: 0, status: 'awaiting_email_confirmation' },
                    { username: 'u6', name: 'User6', email: 'user6@example.com', role: 'Editor', posts: 3, status: 'inactive' },
                ],
                pending: [
                    { username: 'u2', name: 'User2', email: 'user2@example.com', role: 'Editor', posts: 2, status: 'pending' },
                    { username: 'u7', name: 'User7', email: 'user7@example.com', role: 'Subscriber', posts: 1, status: 'pending' }
                ],
                approved: [
                    { username: 'u1', name: 'User1', email: 'test@gmail.com', role: 'Administrator', posts: 0, status: 'approved' },
                    { username: 'u3', name: 'User3', email: 'user3@example.com', role: 'Contributor', posts: 5, status: 'approved' },
                    { username: 'u8', name: 'User8', email: 'user8@example.com', role: 'Editor', posts: 4, status: 'approved' }
                ],
                awaiting_email_confirmation: [
                    { username: 'u5', name: 'User5', email: 'user5@example.com', role: 'Subscriber', posts: 0, status: 'awaiting_email_confirmation' }
                ],
                rejected: [
                    { username: 'u4', name: 'User4', email: 'user4@example.com', role: 'Subscriber', posts: 1, status: 'rejected' },
                    { username: 'u9', name: 'User9', email: 'user9@example.com', role: 'Contributor', posts: 2, status: 'rejected' }
                ],
                inactive: [
                    { username: 'u6', name: 'User6', email: 'user6@example.com', role: 'Editor', posts: 3, status: 'inactive' },
                    { username: 'u10', name: 'User10', email: 'user10@example.com', role: 'Subscriber', posts: 0, status: 'inactive' }
                ]
            };

            const usersPerPage = 3; // Number of users per page
            let currentPage = 1;
            let currentStatus = 'all'; // Default status

            document.querySelectorAll('.count').forEach(countLink => {
                countLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById('users-overview-card').style.display = 'none';
                    document.getElementById('users-list-container').style.display = 'block';

                    currentStatus = this.getAttribute('data-status'); // Set the current status
                    currentPage = 1; // Reset to the first page
                    loadUserData(currentStatus);
                });
            });

            document.getElementById('close-users-list').addEventListener('click', function() {
                document.getElementById('users-list-container').style.display = 'none';
                document.getElementById('users-overview-card').style.display = 'block';
            });

            function loadUserData(status) {
                const userDataTableBody = document.querySelector('#user-data-table tbody');
                userDataTableBody.innerHTML = '';

                const users = userData[status] || [];
                const totalPages = Math.ceil(users.length / usersPerPage);

                // Render current page users
                const startIndex = (currentPage - 1) * usersPerPage;
                const endIndex = Math.min(startIndex + usersPerPage, users.length);
                
                for (let i = startIndex; i < endIndex; i++) {
                    const user = users[i];
                    const row = document.createElement('tr');

                    const selectCell = document.createElement('td');
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.classList.add('user-select');
                    checkbox.setAttribute('data-username', user.username);
                    selectCell.appendChild(checkbox);

                    const usernameCell = document.createElement('td');
                    const nameCell = document.createElement('td');
                    const emailCell = document.createElement('td');
                    const roleCell = document.createElement('td');
                    const postsCell = document.createElement('td');
                    const statusCell = document.createElement('td');

                    usernameCell.textContent = user.username;
                    nameCell.textContent = user.name;
                    emailCell.textContent = user.email;
                    roleCell.textContent = user.role;
                    postsCell.textContent = user.posts;
                    statusCell.textContent = user.status;

                    row.appendChild(selectCell);
                    row.appendChild(usernameCell);
                    row.appendChild(nameCell);
                    row.appendChild(emailCell);
                    row.appendChild(roleCell);
                    row.appendChild(postsCell);
                    row.appendChild(statusCell);
                    userDataTableBody.appendChild(row);
                }

                // Update pagination
                updatePagination(totalPages);
                
                // Select all checkbox functionality
                document.getElementById('select-all').addEventListener('change', function() {
                    const checkboxes = document.querySelectorAll('.user-select');
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = this.checked; // Check or uncheck all checkboxes
                    });
                });
            }

            function updatePagination(totalPages) {
                const paginationElement = document.querySelector('.pagination');
                paginationElement.innerHTML = '';

                // Previous button
                const prevButton = document.createElement('li');
                prevButton.className = 'page-item' + (currentPage === 1 ? ' disabled' : '');
                prevButton.innerHTML = `<a class="page-link" href="#" aria-label="Previous">&laquo;</a>`;
                prevButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        loadUserData(currentStatus);
                    }
                });
                paginationElement.appendChild(prevButton);

                // Page number buttons
                for (let i = 1; i <= totalPages; i++) {
                    const pageItem = document.createElement('li');
                    pageItem.className = `page-item ${i === currentPage ? 'active' : ''}`;
                    pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                    pageItem.addEventListener('click', function(e) {
                        e.preventDefault();
                        currentPage = i;
                        loadUserData(currentStatus);
                    });
                    paginationElement.appendChild(pageItem);
                }

                // Next button
                const nextButton = document.createElement('li');
                nextButton.className = 'page-item' + (currentPage === totalPages ? ' disabled' : '');
                nextButton.innerHTML = `<a class="page-link" href="#" aria-label="Next">&raquo;</a>`;
                nextButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        loadUserData(currentStatus);
                    }
                });
                paginationElement.appendChild(nextButton);
            }

            document.getElementById('performAction').addEventListener('click', function() {
                const selectedAction = document.getElementById('userAction').value;
                const selectedRole = document.getElementById('userRoleFilter').value;

                const selectedUsers = [];
                document.querySelectorAll('.user-select:checked').forEach(checkbox => {
                    const username = checkbox.getAttribute('data-username');
                    selectedUsers.push(username);
                });

                if (selectedUsers.length === 0) {
                    alert('Please select at least one user.');
                    return;
                }

                if (selectedAction) {
                    console.log(`Performing action: ${selectedAction} for users: ${selectedUsers.join(', ')} with role: ${selectedRole}`);
                    alert(`Action '${selectedAction}' performed for users: ${selectedUsers.join(', ')} with role '${selectedRole}'`);
                } else {
                    alert('Please select an action.');
                }
            });
        </script>
    <!-- Tables Script -->
    <!-- Add User Script -->
    <script>
        $(document).ready(function() {
            $('#open-add-user-modal').on('click', function() {
                $('#addUserForm')[0].reset(); // Clear form fields
                $('#addUserModal').modal('show'); // Show the modal
            });

            $('#submitAddUser').on('click', function() {
                const username = $('#username').val();
                const email = $('#email').val();
                const name = $('#name').val();
                const role = $('#role').val();
                const password = $('#password').val();
                const confirmPassword = $('#confirmPassword').val();
                const sendEmail = $('#sendEmail').is(':checked');

                if (password !== confirmPassword) {
                    alert('Passwords do not match.');
                    return;
                }

                alert(`User ${username} added with role ${role}. Send email: ${sendEmail ? 'Yes' : 'No'}`);
                $('#addUserModal').modal('hide'); // Hide modal
            });
        });
    </script>
</body>

</html>
