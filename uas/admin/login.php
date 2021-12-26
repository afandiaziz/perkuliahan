<?php
include 'config/crud.php';
if (isset($_SESSION['USR'])) {
    header('location:index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SESSION['captcha'] == strtoupper($_POST['captcha'])) {
        $username = mysqli_real_escape_string($connection, stripslashes($_POST['username']));
        $password = mysqli_real_escape_string($connection, stripslashes($_POST['password']));

        if (!empty(trim($username)) && !empty(trim($password))) {
            $result = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
            if (mysqli_num_rows($result) == 1) {
                if (password_verify($password, mysqli_fetch_assoc($result)['password'])) {
                    $_SESSION['USR'] = $username;
                    unset($_SESSION['captcha']);
                    header('location:index.php');
                } else {
                    $_SESSION['error'] = 'Password salah';
                }
            } else {
                $_SESSION['error'] = 'Username salah';
            }
        } else {
            $_SESSION['error'] = 'Username dan Password tidak boleh kosong';
        }
    } else {
        $_SESSION['error'] = 'Captcha salah';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Afandi Aziz">

    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <style>
        .required.is-invalid~div {
            display: unset !important;
        }
    </style>
    <script src="vendor/jquery/jquery.min.js"></script>

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                        </div>
                        <?php if (isset($_SESSION['success'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $_SESSION['success']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION['success']);
                        endif; ?>
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $_SESSION['error']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION['error']);
                        endif; ?>
                        <form class="user" method="POST" action="" id="form">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username...">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="my-2"><img src="config/captcha.php" class="rounded-pill"></div>
                                <input type="text" class="form-control form-control-user" onchange="captchaHandler()" placeholder="Captcha" name="captcha">
                                <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="register.php">Create an Account!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function captchaHandler() {
            if ($('input[name=captcha]').val().trim()) {
                $('input[name=captcha]').addClass('text-uppercase');
            } else {
                $('input[name=captcha]').addClass('text-capitalize');
            }
        }
        $(document).ready(function() {
            $('#form').submit(function(e) {
                let x = 0;
                $('input').map((index, item) => {
                    if ($(item).val().trim()) {
                        $(item).removeClass('is-invalid');
                        x++;
                    } else {
                        if (index == x) {
                            $(item).addClass('is-invalid').focus();
                        } else {
                            $(item).addClass('is-invalid');
                        }
                    }
                });
                const y = $('.is-invalid');
                if (y.length) {
                    e.preventDefault();
                    return false;
                } else {
                    return true;
                }
            });
        });
    </script>
</body>

</html>