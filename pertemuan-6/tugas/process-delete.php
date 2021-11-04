<?php
include 'connection.php';

mysqli_query($conn, "DELETE FROM mahasiswabaru WHERE id='$_GET[id]'");
header('location:index.php');
