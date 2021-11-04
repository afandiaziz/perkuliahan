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
        <div class="row">
            <?php
            include 'connection.php';
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