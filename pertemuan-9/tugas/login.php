<?php
include 'connection.php';
session_start();
$error = '';
$validate = '';

if (isset($_SESSION['username'])) {
    header('location:index.php');
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, stripslashes($_POST['password']));
    if (!empty(trim($username)) && !empty(trim($password))) {
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            if (password_verify($password, mysqli_fetch_assoc($result)['password'])) {
                $_SESSION['username'] = $username;
                header('location:index.php');
            } else {
                $error = 'Password salah';
            }
        } else {
            $error = 'Username salah';
        }
    } else {
        $error = 'Username dan Password tidak boleh kosong';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-6">
                <div class="card py-4 px-3">
                    <div class="card-body">
                        <h1 class="fw-bold text-center">Login</h1>
                        <?php
                        if ($error) {
                            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="form-group mb-2">
                                <label for="username" class="text-capitalize">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required autocomplete="off" autofocus placeholder="Username">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="text-capitalize">password</label>
                                <input type="password" class="form-control" id="password" name="password" required autocomplete="off" placeholder="password">
                            </div>
                            <div class="form-group mb-2">
                                <button class="btn btn-primary" name="submit" type="submit">
                                    Sign In
                                </button>
                                <span class="ms-2">Belum punya akun? <a href="register.php">Daftar</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>