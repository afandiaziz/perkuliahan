<?php
include 'connection.php';
$limit = 3;
$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$type = (isset($_GET['type']) ? $_GET['type'] : null);
$q = (isset($_GET['q']) ? $_GET['q'] : null);

$limitStart = ($page - 1) * $limit;
if ($type) {
    $sql = "SELECT * FROM companies WHERE $type LIKE '%$q%'";
} else {
    $sql = "SELECT * FROM companies";
}
$no = $limitStart + 1;
$qry = mysqli_query($conn, $sql . " LIMIT $limitStart, $limit");
$totalData = mysqli_num_rows(mysqli_query($conn, $sql));
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
        <div class="col-lg-8 col-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title mb-0 fs-5 fw-bold">Data Perusahaan</div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-lg-row flex-column mb-3">
                        <div>
                            <a href="insert.php" class="btn btn-primary mb-lg-0 mb-3">Tambah Data</a>
                        </div>
                        <div class="ms-auto">
                            <div class="d-flex">
                                <form action="" method="get">
                                    <input type="hidden" name="page" value="1">
                                    <div class="input-group">
                                        <select name="type" class="form-control me-2" style="">
                                            <option value="">-</option>
                                            <option <?= ($type == 'name' ? 'selected' : null) ?> value="name">Nama Perusahaan</option>
                                            <option <?= ($type == 'address' ? 'selected' : null) ?> value="address">Alamat</option>
                                        </select>
                                        <input value="<?= (isset($_GET['q']) ? $_GET['q'] : null) ?>" type="text" class="form-control" name="q" placeholder="Kata Kunci..." autofocus autocomplete="off">
                                        <button class="btn btn-info" type="submit">Cari</button>
                                        <button class="btn btn-secondary" type="button" onclick="location.href='index.php'">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table table-sm table-bordered table-borderless table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>Deskripsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($totalData > 0) :
                                while ($item = mysqli_fetch_array($qry)) :
                            ?>
                                    <tr>
                                        <td class="align-middle"><?= $no++ ?></td>
                                        <td class="align-middle">
                                            <img src="<?= $item['logo'] ?>" width="80">
                                        </td>
                                        <td class="align-middle"><?= $item['name'] ?></td>
                                        <td class="align-middle"><?= $item['address'] ?></td>
                                        <td class="align-middle"><?= $item['description'] ?></td>
                                        <td class="text-center align-middle" width="10%">
                                            <div class="btn-group">
                                                <a href="update.php?id=<?= $item['id'] ?>" class="btn btn-secondary">Edit</a>
                                                <a href="process-delete.php?id=<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile;
                            else : ?>
                                <tr>
                                    <td colspan="6" class="text-danger text-center">Data Tidak Ada!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="d-flex">
                        <div class="ms-auto">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination shadow-sm">
                                    <?php if ($page == 1) : ?>
                                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                    <?php
                                    else :
                                        $linkPrev = ($page > 1) ? $page - 1 : 1;
                                    ?>
                                        <li class="page-item"><a class="page-link" href="<?= "?page=$linkPrev&type=$type&q=$q" ?>">Previous</a></li>
                                    <?php endif; ?>

                                    <?php
                                    $totalPages = ceil($totalData / $limit);
                                    $num = 1;
                                    $startNum = ($page > $num ? $page - $num : 1);
                                    $endNum = ($page < ($totalPages - $num) ? $page + $num : $totalPages);
                                    for ($i = $startNum; $i <= $totalPages; $i++) :
                                    ?>
                                        <li class="page-item"><a class="page-link <?= $page == $i ? 'active' : null ?>" href="<?= "?page=$i&type=$type&q=$q" ?>"><?= $i ?></a></li>
                                    <?php endfor ?>

                                    <?php if ($page == $totalPages) : ?>
                                        <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                                    <?php
                                    else :
                                        $linkNext = ($page < $totalPages) ? $page + 1 : $totalPages;
                                    ?>
                                        <li class="page-item"><a class="page-link" href="<?= "?page=$linkNext&type=$type&q=$q" ?>">Next</a></li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>