<?php

include "OCR.php";
include "Storage.php";
include __DIR__ . "/../../vendor/autoload.php";

$img_path = 'test.jpg';
file_put_contents($img_path, file_get_contents('https://cityo2o.ecjia.com/sites/member/index.php?m=captcha&c=index&a=init'));

$img = new OCR($img_path);
echo $img->ocr();