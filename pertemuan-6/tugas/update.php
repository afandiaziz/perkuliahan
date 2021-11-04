<?php
include 'connection.php';
$sql = mysqli_query($conn, "SELECT * FROM mahasiswabaru WHERE id='$_GET[id]'");
$item = mysqli_fetch_array($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <a href="index.php" class="btn btn-dark">Kembali</a>
                </div>
                <div class="card-body">
                    <h2 class="mb-4">Edit Data</h2>
                    <form action="process-update.php" method="POST">
                        <input type="hidden" value="<?= $item['id'] ?>" name="id" required>
                        <div class="form-group mb-3">
                            <label for="nama" class="mb-2">Nama</label>
                            <input type="text" id="nama" class="form-control" value="<?= $item['nama'] ?>" required autofocus name="nama" autocomplete="off">
                        </div>
                        <div class="form-group mb-3">
                            <label for="agama" class="mb-2">jenis kelamin</label>
                            <br>
                            <label for="ljk">
                                <input id="ljk" type="radio" value="L" name="jk" required <?= ($item['jk'] == 'L' ? 'checked' : null) ?>> Laki-Laki
                            </label> &nbsp;
                            <label for="pjk">
                                <input id="pjk" type="radio" value="P" name="jk" required <?= ($item['jk'] == 'P' ? 'checked' : null) ?>> Perempuan
                            </label>
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat" class="mb-2">alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="3" required><?= $item['alamat'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="agama" class="mb-2">Agama</label>
                            <input type="text" id="agama" class="form-control" required name="agama" autocomplete="off" value="<?= $item['agama'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="asal" class="mb-2">Asal Sekolah</label>
                            <input type="text" id="asal" class="form-control" required name="asal" autocomplete="off" value="<?= $item['asal'] ?>">
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>