<?php
session_start();
function acakCaptcha()
{
    $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $results = [];
    $karakter_panjang = strlen($karakter) - 2;
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $karakter_panjang);
        $results[] = $karakter[$n];
    }
    return implode($results);
}

$code = acakCaptcha();
$_SESSION['captcha'] = $code;

$wh = imagecreatetruecolor(120, 40);
$bgc = imagecolorallocate($wh, 69, 179, 157);
$fc = imagecolorallocate($wh, 223, 230, 233);
imagefill($wh, 0, 0, $bgc);
imagestring($wh, 8, 35, 12, $code, $fc);


header('Content-type: image/png');
imagejpeg($wh);
imagedestroy($wh);
