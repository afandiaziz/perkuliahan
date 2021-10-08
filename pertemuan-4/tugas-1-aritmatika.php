<?php
$img = 'https://yt3.ggpht.com/ytc/AKedOLTVR9gpaxLQMbtqzLougN3REyQMMrpP0X-ysm432A=s88-c-k-c0x00ffffff-no-rj';
$name = 'Muhammad Afandi Aziz';
$nim = '1907411005';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title><?= $name ?></title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title fw-bold mb-0 h3">
                            <a href="index.php" class="btn btn-outline-info">Kembali</a>
                            <span class="text-center ms-3">Operator Aritmatika</span>
                        </div>
                    </div>
                    <div class="card-body fs-6">

                        <?php
                        $a = 5;
                        $b = 2;
                        echo "<h5>Penjumlahan</h5>";
                        echo "$a + $b = " . ($a + $b);
                        echo "<hr>";
                        echo "<h5>Pengurangan</h5>";
                        echo "$a - $b = " . ($a - $b);
                        echo "<hr>";
                        echo "<h5>Perkalian</h5>";
                        echo "$a * $b = " . ($a * $b);
                        echo "<hr>";
                        echo "<h5>Pembagian</h5>";
                        echo "$a / $b = " . ($a / $b);
                        echo "<hr>";
                        echo "<h5>Sisa Bagi</h5>";
                        echo "$a % $b = " . ($a % $b);
                        echo "<hr>";
                        echo "<h5>Pangkat</h5>";
                        echo "$a<sup>$b</sup> = " . ($a ** $b);
                        ?>
                    </div>
                    <div class="card-footer small text-muted"><?= $name ?>, <?= $nim ?></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>