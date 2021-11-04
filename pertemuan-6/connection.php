<?php

$conn = mysqli_connect('localhost', 'root', null, 'web2_');
if ($conn) {
} else {
    echo 'error : ' . mysqli_connect_error();
}
