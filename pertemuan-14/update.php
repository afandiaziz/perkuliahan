    <?php
    $data = json_decode(file_get_contents('./data.json'));
    foreach ($data as $key => $value) {
        if ($value->nim == $_GET['nim']) {
            $data[$key]->prodi = 'percetakan';
            $data[$key]->jurusan = 'TGP';
        }
    }
    file_put_contents('./data.json', json_encode($data, JSON_PRETTY_PRINT));
    header('location: ./index.php');
    ?>