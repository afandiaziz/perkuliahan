<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['is']) && $_POST['is'] == 'check') {
        if ($_POST['username'] != $_POST['current']) {
            include '../config/crud.php';
            $result = checkUsername($connection, $_POST['username']);
            if (!$result) {
                $_SESSION['error'] = 'Username sudah digunakan';
            }
            echo $result;
        } else {
            echo true;
        }
    }
}
