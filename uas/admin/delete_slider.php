<?php 
    include 'config/crud.php';
    if (deleteData($connection, 'sliders', $_GET['id'], true)) {
        $_SESSION['success'] = 'Berhasil hapus data';
    } else {
        $_SESSION['error'] = 'Gagal hapus data';
    }
    header('location:sliders.php');
?>