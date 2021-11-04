<?php
include 'connection.php';
$logo = 'assets/img/' . date('YmdGis') . '.' . strtolower(pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION));
$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['name']));

if (move_uploaded_file($_FILES["logo"]["tmp_name"], $logo)) {
    if (mysqli_query($conn, "INSERT INTO companies VALUES('', '$logo', '$_POST[name]', '$slug', '$_POST[address]', '$_POST[desc]')")) {
        header('location:admin.php');
    } else {
        header('location:insert.php');
    }
} else {
    header('location:insert.php');
}
