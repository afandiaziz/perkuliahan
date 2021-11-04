<?php
include 'connection.php';
$limit = 2;
$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$type = (isset($_GET['type']) ? $_GET['type'] : null);
$q = (isset($_GET['q']) ? $_GET['q'] : null);
$limitStart = ($page - 1) * $limit;
if ($type == 'nama' || $type == 'nim') {
    $sql = "SELECT * FROM mahasiswa WHERE $type LIKE '%$q%'";
} else {
    $sql = "SELECT * FROM mahasiswa";
}
echo $sql;
$no = $limitStart + 1;
$qry = mysqli_query($conn, $sql . " LIMIT $limitStart, $limit");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <div class="card shadow-sm">
                <div class="card-header">Pencarian</div>
                <div class="card-body">
                    <div class="d-flex">
                        <form action="" method="get">
                            <input type="hidden" name="page" value="1">
                            <div class="input-group">
                                <select name="type" class="form-control me-3" style="width: 250px;">
                                    <option value="">-</option>
                                    <option <?= ($type == 'nama' ? 'selected' : null) ?> value="nama">Nama Mahasiswa</option>
                                    <option <?= ($type == 'nim' ? 'selected' : null) ?> value="nim">NIM Mahasiswa</option>
                                </select>
                                <input value="<?= (isset($_GET['q']) ? $_GET['q'] : null) ?>" type="text" class="form-control" name="q" placeholder="Kata Kunci..." autofocus autocomplete="off" style="width: 350px;">
                                <button class="btn btn-info" type="submit">Cari</button>
                                <button class="btn btn-danger" type="button" onclick="location.href='index.php'">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a href="insert.php" class="btn btn-primary my-3">Tambah Data</a>
            <table class="table table-sm shadow-sm table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($item = mysqli_fetch_array($qry)) :
                    ?>
                        <tr>
                            <td class="align-middle"><?= $no++ ?></td>
                            <td class="align-middle"><?= $item['nama'] ?></td>
                            <td class="align-middle"><?= $item['nim'] ?></td>
                            <td class="align-middle"><?= $item['alamat'] ?></td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="">
                                    <a href="update.php?id=<?= $item['id'] ?>" class="btn btn-secondary">Edit</a>
                                    <a href="process-delete.php?id=<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
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
                            $totalData = mysqli_num_rows(mysqli_query($conn, $sql));
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
</body>

</html>