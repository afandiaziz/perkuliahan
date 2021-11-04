<?php

$conn = mysqli_connect('localhost', 'root', null, 'web2_latihan');
if ($conn) {
    echo 'Connected! <br>';
} else {
    echo 'error : ' . mysqli_connect_error();
}

$query = 'CREATE TABLE IF NOT EXISTS sales (
        id_transaksi int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id_pelanggan int(11) NOT NULL,
        id_produk int(11) NOT NULL,
        tgl_transaksi date NOT NULL,
        kuantitas tinyint(4) NOT NULL,
        harga int(11) NOT NULL,
        KEY id_produk (id_produk)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';

$execute = mysqli_query($conn, $query);
if (!$execute) {
    die('Error : ' . mysqli_error($conn));
} else {
    echo 'Successfully Create Table! <br>';
    $query = 'INSERT INTO sales (id_transaksi, id_pelanggan, id_produk, tgl_transaksi, kuantitas, harga) VALUES (
                    1, 1, 100, "2016-10-12", 8, 
                )';
}
