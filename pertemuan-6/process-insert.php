<?php
include 'connection.php';

mysqli_query($conn, "INSERT INTO mahasiswa VALUES('', '$_POST[nama]', '$_POST[nim]', '$_POST[alamat]')");
header('location:index.php');
