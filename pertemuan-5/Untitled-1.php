<?php
$db_host = 'localhost'; //server
$db_user = 'root'; //username
$db_pass = ''; //password
$db_name = 'web2_latihan'; //nama database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); //sintaks untuk connect ke database mysql

if (!$conn) {
    die('Gagal terhubung dengan database MySQL : ' . mysqli_connect_error());
}

$table_name = 'sales';
$sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas, harga * kuantitas AS total_byr FROM sales';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die('Error : ' . mysqli_error($conn));
}

echo '
    <html>
        <head>
            <title>Tampilan Data Tabel Sales MySQL dengan mysqli_fetch_array</title>
            <style>
                body {font-family: Tahoma, arial}
                table {border-collapse: collapse}
                th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030;}
                th {background: #CCCCCC; font-size: 12px; border-color: #B0B0B0;}
                .subtotal td {background : #F8F8F8}
                .right {text-align: right;}
            </style>
        </head>
        <body>
            <table>
                <thead>
                    <tr>
                        <th>ID Produk</th>
                        <th>Tanggal Transaksi</th>
                        <th>Harga</th>
                        <th>Kuantitas</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>';
while ($row = mysqli_fetch_array($query)) { //fetch_array
    echo '<tr>
                            <td>' . $row['id_produk'] . '</td>
                            <td>' . $row['tgl_transaksi'] . '</td>
                            <td>' . number_format($row['harga'], 0, ',', '.') . '</td>
                            <td class = "right">' . $row['kuantitas'] . '</td>
                            <td>' . number_format($row['total_byr'], 0, ',', '.') . '</td>
                        </tr>';
}
echo '
                </tbody>
            </table>
        </body>
    </html>';

// free result
mysqli_free_result($query);

mysqli_close($conn);
