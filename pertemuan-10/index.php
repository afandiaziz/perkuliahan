<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="">Companies</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        ';
                    } else {
                        echo '
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        ';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php 
        if (isset($_SESSION['username'])) :
    ?>
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-transparent border-0 py-5">
                        <div class="card-body text-center">
                            <h1>Halo, <?= $_SESSION['username'] ?></h1>
                            <p>LOGIN OR REGISTER SUCCESSFULLY</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        endif;
    ?>
    <div class="container my-5">
        <div class="row">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM companies");
            ?>
            <?php while ($item = mysqli_fetch_array($sql)) : ?>
                <div class="col-3 mb-3">
                    <div class="card shadow-sm">
                        <img src="<?= $item['logo'] ?>" class="card-img-top" style="width: 100%!important; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="detail-perusahaan.php?q=<?= $item['slug'] ?>"><?= $item['name'] ?></a></h5>
                            <div class="card-text fw-bold text-muted mb-2">Kantor Pusat : <?= $item['address'] ?></div>
                            <p class="card-text"><?= $item['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>