<?php
include 'connection.php';

mysqli_query($conn, "UPDATE mahasiswa SET nama='$_POST[nama]', nim='$_POST[nim]', alamat='$_POST[alamat]' WHERE id='$_POST[id]'");
header('location:index.php');
