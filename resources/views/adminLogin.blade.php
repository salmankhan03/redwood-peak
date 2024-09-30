<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redwood Peak Limited – Admin Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f3f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width:500px;
            max-width: 500px;
     
        }

        .login-container h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .whiteBg{
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-container .form-control {
            margin-bottom: 15px;
        }

        .login-container .btn {
            width: 100%;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>

@if(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

@if(Session::has('error'))
    <p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif

<body>
    <div class="login-container">
        <div class="text-center mb-5">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.png') }}" class="d-inline-block align-top" alt="Logo" style="">
            </a>
        </div>
        <div class="whiteBg mt-5">        
            <form id="loginForm" action="{{ route('adminLoginPost') }}"  method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="text" class="form-control" id="username" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                {{-- <div class="mb-4 mt-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div> --}}
                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
            <div class="footer-text">
                <a href="#">Lost your password?</a>
            </div>
        </div>
        <!-- Toast Notification -->
            <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 50px; right: 20px; z-index: 1050;">
                <div class="toast" id="loginToast" style="display: none;">
                    <div class="toast-header">
                        <strong class="mr-auto" id="toastTitle">Notification</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body" id="toastBody"></div>
                </div>
            </div>
        <!-- Toast Notification -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Prepare data for AJAX request
                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'), // Use form action
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Redirect to admin dashboard
                        window.location.href = "{{ route('adminDashboard') }}";
                        // Show success toast
                        showToast('Success!', 'Successfully logged in!', 'bg-success text-white');
                    },
                    error: function(xhr) {
                        // Handle errors (for example, show an alert or toast)
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';

                        // Display all errors
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '<br>'; // Take the first error message
                        });

                        showToast('Error!', errorMessage, 'bg-danger text-white');
                    }
                });
            });
        });

        function showToast(title, body, classes) {
            $('#toastTitle').text(title);
            $('#toastBody').html(body);
            $('#loginToast').removeClass('bg-success bg-danger text-white').addClass(classes);
            $('#loginToast').fadeIn().toast({ delay: 3000 }).toast('show');
        }
    </script> --}}
</body>

</html>
