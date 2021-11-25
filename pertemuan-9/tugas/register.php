<?php
include 'connection.php';
session_start();
$error = '';
$validate = '';

function cek_username($username, $conn)
{
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        return false;
    } else {
        return true;
    }
}

if (isset($_SESSION['username'])) {
    header('location:index.php');
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
    $username = mysqli_real_escape_string($conn, stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, stripslashes($_POST['password']));
    $email = mysqli_real_escape_string($conn, stripslashes($_POST['email']));
    $repassword = mysqli_real_escape_string($conn, stripslashes($_POST['repassword']));

    if (!empty(trim($username)) && !empty(trim($password)) && !empty(trim($repassword)) && !empty(trim($email)) && !empty(trim($name))) {
        if ($repassword == $password) {
            if (cek_username($username, $conn)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (name, username, password, email) VALUES ('$name', '$username', '$password', '$email')";
                if (mysqli_query($conn, $query)) {
                    $_SESSION['username'] = $username;
                    header('location:index.php');
                } else {
                    $error = 'Error Registrasi Gagal : ' . mysqli_error($conn);
                }
            } else {
                $error = 'Username sudah terdaftar';
            }
        } else {
            $error = 'Password tidak sama';
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
                                <label for="name" class="text-capitalize">name</label>
                                <input type="text" class="form-control" id="name" name="name" required autocomplete="off" autofocus placeholder="name">
                            </div>
                            <div class="form-group mb-2">
                                <label for="username" class="text-capitalize">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required autocomplete="off" placeholder="Username">
                            </div>
                            <div class="form-group mb-2">
                                <label for="email" class="text-capitalize">email</label>
                                <input type="email" class="form-control" id="email" name="email" required autocomplete="off" placeholder="email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="text-capitalize">password</label>
                                <input type="password" class="form-control" id="password" name="password" required autocomplete="off" placeholder="password">
                                <?php
                                if ($validate) {
                                    echo '<div class="small text-danger">' . $validate . '</div>';
                                }
                                ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="repassword" class="text-capitalize">Re password</label>
                                <input type="password" class="form-control" id="repassword" name="repassword" required autocomplete="off" placeholder="repassword">
                                <?php
                                if ($validate) {
                                    echo '<div class="small text-danger">' . $validate . '</div>';
                                }
                                ?>
                            </div>
                            <div class="form-group mb-2">
                                <button class="btn btn-primary" name="submit" type="submit">
                                    Sign Up
                                </button>
                                <span class="ms-2">Sudah punya akun? <a href="login.php">Login</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>