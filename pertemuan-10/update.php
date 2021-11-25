<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Muhammad Afandi Aziz | UTS</title>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-7 col-12">
            <div class="card shadow">
                <div class="card-header">
                    <a href="admin.php" class="btn btn-dark">Kembali</a>
                </div>
                <div class="card-body">
                    <h2 class="mb-4">Update Data</h2>
                    <?php
                    include 'connection.php';
                    $sql = mysqli_query($conn, "SELECT * FROM companies WHERE id='$_GET[id]'");
                    $item = mysqli_fetch_array($sql);
                    ?>
                    <form action="process-update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $item['id'] ?>" name="id" required>
                        <input type="hidden" value="<?= $item['logo'] ?>" name="old-logo" required>
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-2">Nama Perusahaan <span class="text-danger">(required)</span></label>
                                    <input type="text" id="name" class="form-control" required autofocus name="name" autocomplete="off" value="<?= $item['name'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="logo" class="mb-2">Ganti Logo Perusahaan</label>
                                    <input type="file" id="logo" class="form-control" name="logo" autocomplete="off" accept="image/*">
                                </div>
                            </div>
                            <div class="col-5 text-center">
                                <h5 class="m-0 text-start">Logo saat ini</h5>
                                <img src="<?= $item['logo'] ?>" class="w-50">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="mb-2">Alamat <span class="text-danger">(required)</span></label>
                            <textarea name="address" class="form-control" id="address" rows="2" required><?= $item['address'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="desc" class="mb-2">Deskripsi <span class="text-danger">(required)</span></label>
                            <textarea name="desc" class="form-control" id="desc" rows="2" required><?= $item['description'] ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>