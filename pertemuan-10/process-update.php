<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['name']));
if ($_FILES['logo']['name']) {
    $logo = 'assets/img/' . date('YmdGis') . '.' . strtolower(pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION));
    unlink($_POST['old-logo']);
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $logo)) {
        if (mysqli_query($conn, "UPDATE companies SET logo = '$logo', name = '$_POST[name]', slug = '$slug', address = '$_POST[address]', description = '$_POST[desc]' WHERE id = '$_POST[id]'")) {
            header('location:admin.php');
        } else {
            header('location:update.php?id=' . $_POST['id']);
        }
    } else {
        header('location:update.php?id=' . $_POST['id']);
    }
} else {
    if (mysqli_query($conn, "UPDATE companies SET name = '$_POST[name]', slug = '$slug', address = '$_POST[address]', description = '$_POST[desc]' WHERE id = '$_POST[id]'")) {
        header('location:admin.php');
    } else {
        header('location:update.php?id=' . $_POST['id']);
    }
}
