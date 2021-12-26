<?php 
    include 'includes/header.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_FILES['image']['name']) {
            $filename = date('YmdGis'). $_FILES["image"]["name"];
            if (move_uploaded_file($_FILES["image"]["tmp_name"], '../images/' . $filename)) {;
                if (insertData($connection, 'sliders', [
                    'image' => $filename
                ])) {
                    $_SESSION['success'] = 'Berhasil tambah data';
                    echo("<script>location.href = 'sliders.php';</script>");
                } else {
                    $_SESSION['error'] = 'Gagal tambah data';
                }
            } else {
                $_SESSION['error'] = 'Gagal upload gambar';
            }
        } else {
            $_SESSION['error'] = 'Silahkan pilih gambar';
        }
    }
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Sliders</h1>
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['error']);
    endif; ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Image</label>
                    <input required type="file" name="image" id="image" data-height="320" accept="image/*" class="form-control dropify">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include 'includes/footer.php'; ?>