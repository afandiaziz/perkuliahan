<?php
include 'includes/header.php';
$data = getData($connection, 'projects', $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename_image = $data['image'];
    if ($_FILES['image']['name']) {
        if (unlink('../images/' . $data['image'])) {
            $filename = date('YmdGis') . $_FILES["image"]["name"];
            if (move_uploaded_file($_FILES["image"]["tmp_name"], '../images/' . $filename)) {
                $filename_image = $filename;
            } else {
                $_SESSION['error'] = 'Gagal upload gambar';
            }
        } else {
            $_SESSION['error'] = 'Gagal upload gambar';
        }
    } else {
        $_SESSION['error'] = 'Silahkan pilih gambar';
    }

    if (updateData($connection, 'projects', $_GET['id'], [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'image' => $filename_image
    ])) {
        $_SESSION['success'] = 'Berhasil edit data';
        echo ("<script>location.href = 'projects.php';</script>");
    } else {
        $_SESSION['error'] = 'Gagal edit data';
    }
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 text-capitalize">projects</h1>
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
            <form action="?id=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control required" value="<?= $data['title'] ?>">
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control required" rows="4"><?= $data['description'] ?></textarea>
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" data-default-file="../images/<?= $data['image'] ?>" data-height="320" accept="image/*" class="form-control dropify">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include 'includes/footer.php'; ?>