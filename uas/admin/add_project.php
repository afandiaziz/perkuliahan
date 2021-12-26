<?php
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['image']['name']) {
        $filename = date('YmdGis') . $_FILES["image"]["name"];
        if (move_uploaded_file($_FILES["image"]["tmp_name"], '../images/' . $filename)) {;
            if (insertData($connection, 'projects', [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'image' => $filename
            ])) {
                $_SESSION['success'] = 'Berhasil tambah data';
                echo ("<script>location.href = 'projects.php';</script>");
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
            <form action="" method="post" id="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control required">
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control required" rows="4"></textarea>
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" data-height="200" accept="image/*" class="form-control dropify">
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            const required = $('.required');
            let x = 0;
            required.map((index, item) => {
                if ($('#' + item.getAttribute('id')).val().trim()) {
                    $('#' + item.getAttribute('id')).removeClass('is-invalid').removeAttr('required');
                    x++;
                } else {
                    if (index == x) {
                        $('#' + item.getAttribute('id')).addClass('is-invalid').attr('required', 'required').focus();
                    } else {
                        $('#' + item.getAttribute('id')).addClass('is-invalid').attr('required', 'required');
                    }
                }
            });
            const y = $('.required.is-invalid');
            if (y.length) {
                e.preventDefault();
                return false;
            } else {
                return true;
            }
        });
    });
</script>
<!-- /.container-fluid -->
<?php include 'includes/footer.php'; ?>