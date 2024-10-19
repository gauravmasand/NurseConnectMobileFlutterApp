<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">
<head>
    <meta charset="utf-8" />
    <title>Authenticate Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.php" class="d-inline-block auth-logo">
                                    <img src="assets/images/hackathon_logo.jpg" alt="" height="100" width="100" />
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Authenticate Me</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back!</h5>
                                    <p class="text-muted">Login to continue to Authenticate Me.</p>
                                </div>
                                <div class="p-2 mt-4">

                                    <!-- Display error message if credentials are invalid -->
                                    <div id="error-message" class="alert alert-danger d-none" role="alert">
                                        Invalid email or password!
                                    </div>

                                    <form id="login-form">
                                        <div class="mb-3">
                                            <label for="u_email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="u_email" name="u_email"
                                                placeholder="Enter Email" required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5"
                                                    placeholder="Enter password" name="password" id="password-input"
                                                    required />
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                    type="button" id="password-addon"
                                                    onclick="togglePasswordVisibility()">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">
                                                Sign In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <!-- Add any footer content here -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <script>
        document.getElementById("login-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission

            var email = document.getElementById("u_email").value;
            var password = document.getElementById("password-input").value;

            // Validate the username and password
            if (email === "admin" && password === "admin") {
                // Redirect to home page if valid
                window.location.href = "Home.php";
            } else {
                // Show error message if invalid
                document.getElementById("error-message").classList.remove("d-none");
            }
        });

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password-input");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }
    </script>
</body>

</html>
