<?php
include 'config/crud.php';
if ($_GET['id'] == 1) {
    $_SESSION['error'] = 'User ini tidak bisa dihapus';
    header('location:users.php');
} else {
    if (deleteData($connection, 'users', $_GET['id'], false)) {
        $_SESSION['success'] = 'Berhasil hapus data';
    } else {
        $_SESSION['error'] = 'Gagal hapus data';
    }
    header('location:users.php');
}
