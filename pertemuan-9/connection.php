<?php

$conn = mysqli_connect('localhost', 'root', null, 'web2_latihan');
if ($conn) {
} else {
    echo 'error : ' . mysqli_connect_error();
}
