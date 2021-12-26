<?php
include 'includes/header.php';
$data = getData($connection, 'about');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (updateData($connection, 'about', null, [
        'content' => $_POST['content'],
    ])) {
        echo ("<script>location.href = 'about.php?msg=success';</script>");
    } else {
        echo ("<script>location.href = 'about.php?msg=error';</script>");
    }
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">About Us</h1>
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'error') : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Gagal edit data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success') : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil edit data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post" id="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" class="form-control required editor"><?= $data['content'] ?></textarea>
                    <input type="hidden" class="form-control" name="content" id="content-hidden">
                    <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            if ($('.ck-content').text().trim()) {
                const editorData = editor.getData();
                $('input[name=content]').val(editorData);
                return true;
            } else {
                $('input[name=content]').val('');
                $('#content-hidden~div').removeClass('d-none');
                e.preventDefault();
                return false;
            }
        });
    });
</script>
<!-- /.container-fluid -->
<?php include 'includes/footer.php'; ?>

<script>
    let editorData;
    ClassicEditor
        .create(document.querySelector('.editor'), {
            licenseKey: '',
        })
        .then(editor => {
            window.editor = editor;
            editorData = editor;
        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: phj3tz7bwum9-94bb0f4vj80c');
            console.error(error);
        });
</script>