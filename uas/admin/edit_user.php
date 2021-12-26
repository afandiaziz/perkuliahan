<?php
include 'includes/header.php';
$data = getData($connection, 'users', $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connection, stripslashes($_POST['name']));
    $username = mysqli_real_escape_string($connection, stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($connection, stripslashes($_POST['password']));
    $email = mysqli_real_escape_string($connection, stripslashes($_POST['email']));
    $repassword = mysqli_real_escape_string($connection, stripslashes($_POST['repassword']));

    if (!empty(trim($password))) {
        if ($password == $repassword) {
            if (updateData($connection, 'users', $_GET['id'], [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'email' => $email,
                'name' => $name
            ])) {
                $_SESSION['success'] = 'Berhasil edit data';
                echo ("<script>location.href = 'users.php';</script>");
            } else {
                $_SESSION['error'] = 'Gagal edit data';
            }
        } else {
            $_SESSION['error'] = 'Password tidak sesuai';
        }
    } else {
        if (updateData($connection, 'users', $_GET['id'], [
            'username' => $username,
            'email' => $email,
            'name' => $name
        ])) {
            $_SESSION['success'] = 'Berhasil edit data';
            echo ("<script>location.href = 'users.php';</script>");
        } else {
            $_SESSION['error'] = 'Gagal edit data';
        }
    }
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Users</h1>
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
            <form onsubmit="return formSubmit()" action="?id=<?= $data['id'] ?>" id="form" method="post">
                <div class="form-group">
                    <label for="name" class="text-capitalize">name</label>
                    <input type="text" name="name" id="name" class="form-control" required value="<?= $data['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="email" class="text-capitalize">email</label>
                    <input type="email" name="email" id="email" class="form-control" required value="<?= $data['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="username" class="text-capitalize">username</label>
                    <input type="text" name="username" id="username" class="form-control" required value="<?= $data['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="password" class="text-capitalize">password</label>
                    <input onchange="passwordHandler()" type="password" minlength="6" name="password" id="password" class="form-control">
                    <div>
                        <small>Kosongkan jika tidak ingin mengubah password</small>
                    </div>
                </div>
                <div class="form-group d-none" id="repassword-content">
                    <label for="repassword" class="text-capitalize">Repassword</label>
                    <input type="password" name="repassword" id="repassword" minlength="6" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    function passwordHandler() {
        if (document.getElementById('password').value.trim()) {
            document.getElementById('repassword-content').classList.remove('d-none');
            document.querySelector('#repassword-content input').setAttribute('required', 'required');
            document.querySelector('#repassword-content input').focus();
        } else {
            document.querySelector('#repassword-content input').removeAttribute('required', 'required');
            document.getElementById('repassword-content').classList.add('d-none');
        }
    }
</script>

<script>
    // jquery ajax check username unique
    function formSubmit() {
        let status = true;
        $.ajax({
            url: 'ajax/check-username.php',
            method: 'post',
            async: false,
            data: {
                is: 'check',
                username: $('#username').val(),
                current: '<?= $data['username'] ?>'
            },
            success: function(response) {
                if (!response) {
                    status = false;
                }
            }
        });
        if (!status) {
            location.reload();
            return false;
        } else {
            return true;
        }
    }
</script>

<!-- /.container-fluid -->
<?php include 'includes/footer.php'; ?>