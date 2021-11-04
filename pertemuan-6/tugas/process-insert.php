<?php
include 'connection.php';

mysqli_query($conn, "INSERT INTO mahasiswabaru VALUES('', '$_POST[nama]', '$_POST[alamat]', '$_POST[agama]', '$_POST[asal]', '$_POST[jk]')");
header('location:index.php');
