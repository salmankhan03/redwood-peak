<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserList – Redwood Peak Limited</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
    <!-- FontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            <div class="mt-4">
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
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all" /></th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><input type="checkbox" class="user-select" data-username="{{ $user['username'] }}" id="selectUser{{ $user['username'] }}" name="selectedUsers[]" value="{{ $user['username'] }}"></td>
                            <td>{{ $user['username'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            <td>{{ $user['status'] }}</td>
                            <td>
                                <!-- Edit Icon triggers the modal -->
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user['username'] }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Delete Icon -->
                                <form action="{{ route('user.delete', ['username' => $user['username']]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE') <!-- This is important for DELETE requests -->
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit User Modal -->
                        <div class="modal fade" id="editUserModal{{ $user['username'] }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editUserModalLabel">Edit User: {{ $user['name'] }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('user.update', ['username' => $user['username']]) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Use PUT for updating -->
                                        <div class="modal-body">
                                            <!-- Username (read-only) -->
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" value="{{ $user['username'] }}" readonly>
                                            </div>
                                            <!-- Name -->
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}" required>
                                            </div>
                                            <!-- Email -->
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" required>
                                            </div>
                                            <!-- Role -->
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role</label>
                                                <select id="role" class="form-control" name="role" required>
                                                    <option value="Administrator" {{ $user['role'] == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                                    <option value="Editor" {{ $user['role'] == 'Editor' ? 'selected' : '' }}>Editor</option>
                                                    <!-- Add more roles as needed -->
                                                </select>
                                            </div>
                                            <!-- Status -->
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select id="status" class="form-control" name="status" required>
                                                    <option value="approved" {{ $user['status'] == 'approved' ? 'selected' : '' }}>Approved</option>
                                                    <option value="pending" {{ $user['status'] == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="rejected" {{ $user['status'] == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                    <!-- Add more statuses as needed -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="User Pagination">
                        <ul class="pagination justify-content-center"></ul>
                    </nav>

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
    <script>
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

</body>

</html>
