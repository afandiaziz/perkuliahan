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
                            <span class="text-center ms-3">Volume Bola</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['r'])) {
                            $r = $_GET['r'];
                        } else {
                            $r = 15;
                        }
                        ?>
                        <form action="" method="get">
                            <label for="#jarijari" class="fw-bold mb-2">Jari-Jari Bola</label>
                            <input type="text" id="jarijari" name="r" value="<?= $r ?>" autofocus autocomplete="off" required class="form-control">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary mt-2">Hitung</button>
                            </div>
                        </form>
                        <hr>
                        <h4>Result :</h4>
                        <div class="mt-2">
                            Rumus Volume Bola :
                            <strong>4/3 * &pi; * r<sup>3</sup></strong>
                            <br>
                            Jari-Jari Bola : <?= $r ?>cm
                            <br>
                            <br>
                            <strong>Jawab :</strong>
                            <br>
                            <span>4/3 * &pi; * <?= $r ?><sup>3</sup></span>
                            <br>
                            = <strong><?= (4 / 3) * (22 / 7) * $r * $r * $r ?>cm</strong>

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