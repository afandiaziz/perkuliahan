<?php include 'includes/header.php'; ?>
<?php
$data = fetchData($connection, 'SELECT * FROM sliders');
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
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['success']);
    endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="add_slider.php" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th width="15%" class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($data) : ?>
                            <?php foreach ($data as $item) : ?>
                                <tr>
                                    <td><img width="180" src="../images/<?= $item['image'] ?>"></td>
                                    <td class="text-center align-middle">
                                        <a href="edit_slider.php?id=<?= $item['id'] ?>" class="btn btn-info">Edit</a>
                                        <a href="delete_slider.php?id=<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="2" class="text-center">Data Kosong</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include 'includes/footer.php'; ?>