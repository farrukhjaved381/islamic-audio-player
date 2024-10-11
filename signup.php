<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>

    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <!-- Form begins -->
                                <form action="register.php" method="POST">

                                    <!-- Name input field -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                            placeholder="Enter your name" name="username" required />
                                        <label class="form-label" for="form3Example1cg">Your Name</label>
                                    </div>

                                    <!-- Email input field -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg"
                                            placeholder="Enter your email" name="email" required />
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                    </div>

                                    <!-- Password input field -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg"
                                            placeholder="Enter your password" name="password" required />
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                    </div>

                                    <!-- Repeat Password input field -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cdg"
                                            class="form-control form-control-lg" placeholder="Repeat your password"
                                            name="confirm_password" required />
                                        <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                    </div>

                                    <!-- Register button -->
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                    <!-- Login link -->
                                    <p class="text-center text-muted mt-5 mb-0">Already have an account? <a
                                            href="login.php" class="fw-bold text-body login-link"><u>Login here</u></a></p>

                                </form>
                                <!-- Form ends -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
