<?php
include 'admin/config/crud.php';
$config = getData($connection, 'config');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Afandi Aziz" />
    <title><?= $config['site'] ?> - <?= $config['tagline'] ?></title>
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/aos/aos.css" rel="stylesheet" />
    <link href="style/main.css" rel="stylesheet" />
    <script src="vendor/jquery/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>