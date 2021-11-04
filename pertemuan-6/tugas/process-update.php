<?php
include 'connection.php';

mysqli_query($conn, "UPDATE mahasiswabaru SET nama='$_POST[nama]', alamat='$_POST[alamat]', agama='$_POST[agama]', asal='$_POST[asal]', jk='$_POST[jk]' WHERE id='$_POST[id]'");
header('location:index.php');
