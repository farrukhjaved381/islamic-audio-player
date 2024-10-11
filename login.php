<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <section class="vh-100" style="background-color: #6a11cb;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Sign in</h3>

                            <form action="login_process.php" method="POST">
                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg"
                                        placeholder="Enter your email" required />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg"
                                        placeholder="Enter your password" required />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                </div>

                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" name="remember" />
                                    <label class="form-check-label ms-2" for="form1Example3"> Remember password </label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                                <hr class="my-4">

                                <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit">
                                    <i class="fab fa-google me-2"></i> Sign in with Google
                                </button>
                                <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="submit">
                                    <i class="fab fa-facebook-f me-2"></i>Sign in with Facebook
                                </button>
                                <p class="text-center text-muted mt-5 mb-0">Not have an account? <a href="signup.php"
                                    class="fw-bold text-body register-link"><u>Register here</u></a></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
