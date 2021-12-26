<?php
include 'includes/header.php';
$data = getData($connection, 'config');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename_logo = $data['logo'];
    $filename_favicon = $data['favicon'];

    if ($_FILES['logo']['name']) {
        if (unlink('../images/' . $data['logo'])) {
            $filename = date('YmdGis') . $_FILES["logo"]["name"];
            if (move_uploaded_file($_FILES["logo"]["tmp_name"], '../images/' . $filename)) {;
                $filename_logo = $filename;
            } else {
                echo ("<script>location.href = 'config.php?msg=error';</script>");
            }
        } else {
            echo ("<script>location.href = 'config.php?msg=error';</script>");
        }
    }
    if ($_FILES['favicon']['name']) {
        if (unlink('../images/' . $data['favicon'])) {
            $filename = date('YmdGis') . $_FILES["favicon"]["name"];
            if (move_uploaded_file($_FILES["favicon"]["tmp_name"], '../images/' . $filename)) {;
                $filename_favicon = $filename;
            } else {
                echo ("<script>location.href = 'config.php?msg=error';</script>");
            }
        } else {
            echo ("<script>location.href = 'config.php?msg=error';</script>");
        }
    }

    if (updateData($connection, 'config', null, [
        'site' => $_POST['site'],
        'tagline' => $_POST['tagline'],
        'header_title' => $_POST['header_title'],
        'header_desc' => $_POST['header_desc'],
        'address' => $_POST['address'],
        'maps' => $_POST['maps'],
        'email' => $_POST['email'],
        'wa' => $_POST['wa'],
        'ig' => $_POST['ig'],
        'fb' => $_POST['fb'],
        'logo' => $filename_logo,
        'favicon' => $filename_favicon,
    ])) {
        echo ("<script>location.href = 'config.php?msg=success';</script>");
    } else {
        echo ("<script>location.href = 'config.php?msg=error';</script>");
    }
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Web Configuration</h1>
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
                <input type="hidden" name="old_logo" value="<?= $data['logo'] ?>" readonly>
                <input type="hidden" name="old_favicon" value="<?= $data['favicon'] ?>" readonly>

                <div class="form-group">
                    <label for="site">Site Name</label>
                    <input type="text" name="site" id="site" class="form-control required" value="<?= $data['site'] ?>">
                    <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                </div>
                <div class="form-group">
                    <label for="tagline">Tagline</label>
                    <input type="text" name="tagline" id="tagline" class="form-control required" value="<?= $data['tagline'] ?>">
                    <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="header_title">Header Title</label>
                            <input type="text" name="header_title" id="header_title" class="form-control required" value="<?= $data['header_title'] ?>">
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="header_desc">Header Description</label>
                            <input type="text" name="header_desc" id="header_desc" class="form-control" value="<?= $data['header_desc'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" rows="2" class="form-control required"><?= $data['address'] ?></textarea>
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="maps">Google Maps</label>
                            <textarea onchange="googlemapsHandler()" name="maps" id="maps" rows="2" class="form-control required"><?= $data['maps'] ?></textarea>
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" data-default-file="../images/<?= $data['logo'] ?>" data-height="180" accept="image/*" class="form-control dropify">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="file" name="favicon" id="favicon" data-default-file="../images/<?= $data['favicon'] ?>" data-height="180" accept="image/*" class="form-control dropify">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control required" value="<?= $data['email'] ?>">
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="wa">Whatsapp</label>
                            <input type="text" name="wa" id="wa" class="form-control required" value="<?= $data['wa'] ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey == false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">
                            <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="ig">Instagram</label>
                            <input type="text" name="ig" id="ig" class="form-control" value="<?= $data['ig'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="fb">Facebook</label>
                            <input type="text" name="fb" id="fb" class="form-control" value="<?= $data['fb'] ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    function googlemapsHandler() {
        $('#maps').val($('#maps').val().replace(' width="600"', '').replace(' height="450"', ''));
    }
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