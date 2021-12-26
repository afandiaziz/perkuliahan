<?php
include 'config/crud.php';
if (isset($_SESSION['USR'])) {
    header('location:index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_SESSION['captcha'];
    echo strtoupper($_POST['captcha']);
    if ($_SESSION['captcha'] == strtoupper($_POST['captcha'])) {
        $name = mysqli_real_escape_string($connection, stripslashes($_POST['name']));
        $username = mysqli_real_escape_string($connection, stripslashes($_POST['username']));
        $password = mysqli_real_escape_string($connection, stripslashes($_POST['password']));
        $email = mysqli_real_escape_string($connection, stripslashes($_POST['email']));
        $repassword = mysqli_real_escape_string($connection, stripslashes($_POST['repassword']));

        if ($password == $repassword) {
            if (checkUsername($connection, $username)) {
                if (insertData($connection, 'users', [
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'email' => $email,
                    'name' => $name
                ])) {
                    $_SESSION['success'] = 'Berhasil daftar';
                    echo ("<script>location.href = 'login.php';</script>");
                } else {
                    $_SESSION['error'] = 'Gagal daftar';
                }
            } else {
                $_SESSION['error'] = 'Username sudah digunakan';
            }
        } else {
            $_SESSION['error'] = 'Password tidak sesuai';
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

    <title>Register</title>
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
            <div class="col-lg-6 col-md-9 col-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $_SESSION['error']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION['error']);
                        endif; ?>
                        <form class="user" method="post" action="" id="form">
                            <div class="form-group">
                                <input type="text" class="required form-control form-control-user" placeholder="Name" name="name">
                                <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="required form-control form-control-user" placeholder="Username" name="username">
                                <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="required form-control form-control-user" placeholder="Email Address" name="email">
                                <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" minlength="6" class="required form-control form-control-user" placeholder="Password" name="password">
                                    <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" minlength="6" class="required form-control form-control-user" placeholder="Repeat Password" name="repassword">
                                    <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="my-2"><img src="config/captcha.php" class="rounded-pill"></div>
                                <input type="text" class="required form-control form-control-user" onchange="captchaHandler()" placeholder="Captcha" name="captcha">
                                <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                            </div>
                            <button type="submit" class="btn btn-success btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="login.php">Already have an account? Login!</a>
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