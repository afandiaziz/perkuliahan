<?php

$conn = mysqli_connect('localhost', 'root', null, 'web2_uts');
if ($conn) {
    // echo 'ok';
} else {
    echo 'error : ' . mysqli_connect_error();
}
