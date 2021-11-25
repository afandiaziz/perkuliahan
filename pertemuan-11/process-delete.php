<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
$CURRENT = mysqli_fetch_array(mysqli_query($conn, "SELECT logo FROM companies WHERE id='$_GET[id]'"));
unlink($CURRENT['logo']);
mysqli_query($conn, "DELETE FROM companies WHERE id='$_GET[id]'");
header('location:admin.php');
