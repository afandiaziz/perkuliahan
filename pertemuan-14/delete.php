<?php
$data = json_decode(file_get_contents('./data.json'));
foreach ($data as $key => $value) {
    if ($value->nim == $_GET['nim']) {
        array_splice($data, $key, 1);
    }
}
file_put_contents('./data.json', json_encode($data, JSON_PRETTY_PRINT));
header('location: ./index.php');
