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
    <div class="container my-5">
        <div class="row justify-content-center">
            <?php
            include 'connection.php';
            $sql = mysqli_query($conn, "SELECT * FROM companies WHERE slug = '$_GET[q]'");
            $item = mysqli_fetch_array($sql);
            ?>
            <div class="col-8 mb-3">
                <div class="card-header">
                    <a href="index.php" class="btn btn-dark">Kembali</a>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?= $item['logo'] ?>" class="card-img-top" style="width: 100%!important;">
                            </div>
                            <div class="col-8 my-4">
                                <h5 class="card-title"><?= $item['name'] ?></h5>
                                <div class="card-text fw-bold text-muted mb-2">Kantor Pusat : <?= $item['address'] ?></div>
                                <p class="card-text"><?= $item['description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>