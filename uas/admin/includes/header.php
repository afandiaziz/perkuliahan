<?php
include 'config/crud.php';
if (!isset($_SESSION['USR'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Afandi Aziz">

    <title>Administrator</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- <link href="vendor/ckeditor/styles.css" rel="stylesheet"> -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="vendor/dropify/dropify.min.css" rel="stylesheet">
    <style>
        .required.is-invalid~div {
            display: unset !important;
        }
    </style>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/ckeditor/ckeditor.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include_once 'sidebar.php' ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include_once 'navbar.php' ?>