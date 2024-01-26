<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Register</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset ('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('admin/assets/plugins/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ asset ('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('admin/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('admin/assets/css/style.css') }}">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ asset ('admin/assets/img/login.png') }}" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Sign Up</h1>
                            <p class="account-subtitle">Enter details to create your account</p>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label>name <span class="login-danger">*</span></label>
                                    <input id="name" class="form-control" name="name" type="text" required autocomplete="name" autofocus>
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Username / Email <span class="login-danger">*</span></label>
                                    <input id="email" class="form-control" name="email" type="text" required autocomplete="email" autofocus>
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input id="password" class="form-control pass-input" type="password" name="password" required autocomplete="new-password">
                                    <span class="profile-views feather-eye toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm password <span class="login-danger">*</span></label>
                                    <input id="password-confirm" class="form-control pass-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                    <span class="profile-views feather-eye reg-toggle-password"></span>
                                </div>
                                <div class=" dont-have">Already Registered? <a href="{{ route('login') }}">Login</a></div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </form>

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            <div class="social-login">
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset ('admin/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset ('admin/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset ('admin/assets/js/script.js') }}"></script>
</body>

</html>