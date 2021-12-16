<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-lg-8">
                <a href="insert.php" class="btn btn-primary mb-4">Insert 5 Data to JSON File</a>
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Prodi</th>
                            <th>Jurusan</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach (json_decode(file_get_contents('./data.json')) as $item) {
                            echo "<tr>
                                    <td>$item->nim</td>
                                    <td>$item->name</td>
                                    <td>$item->kelas</td>
                                    <td>$item->prodi</td>
                                    <td>$item->jurusan</td>
                                    <td>
                                        <a href='update.php?nim=$item->nim' class='btn btn-secondary text-capitalize'>update</a>
                                        <a href='delete.php?nim=$item->nim' class='btn btn-danger text-capitalize'>delete</a>
                                    </td>
                                </tr>";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>