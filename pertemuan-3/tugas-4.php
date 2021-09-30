<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Muhammad Afandi Aziz</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title fw-bold mb-0 h3">
                            <a href="index.php" class="btn btn-outline-info">Kembali</a>
                            <span class="text-center ms-3">Volume Balok</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['p'])) {
                            $p = $_GET['p'];
                            $l = $_GET['l'];
                            $t = $_GET['t'];
                        } else {
                            $p = 5;
                            $l = 3;
                            $t = 7;
                        }
                        ?>
                        <form action="" method="get">
                            <div class="form-group">
                                <label for="#p" class="fw-bold mb-2">Panjang Balok</label>
                                <input type="text" id="p" name="p" value="<?= $p ?>" autofocus autocomplete="off" required class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="#l" class="fw-bold mb-2">Lebar Balok</label>
                                <input type="text" id="l" name="l" value="<?= $l ?>" autocomplete="off" required class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="#t" class="fw-bold mb-2">Tinggi Balok</label>
                                <input type="text" id="t" name="t" value="<?= $t ?>" autocomplete="off" required class="form-control">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary mt-2">Hitung</button>
                            </div>
                        </form>
                        <hr>
                        <h4>Result :</h4>
                        <div class="mt-2">
                            Rumus Volume Balok :
                            <strong>p * l * t</strong>
                            <br>
                            Panjang Balok : <?= $p ?>cm
                            <br>
                            Lebar Balok : <?= $l ?>cm
                            <br>
                            Tinggi Balok : <?= $t ?>cm
                            <br>
                            <br>
                            <strong>Jawab :</strong>
                            <br>
                            <span><?= $p ?> * <?= $l ?> * <?= $t ?></span>
                            <br>
                            = <strong><?= $p * $l * $t ?>cm</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>