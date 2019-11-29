<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use PhpQrcode\PhpQrcode;

$data = [
    'content' => 'https://github.com/overlordz',
    'bgPic' => dirname(__DIR__).'/src/assets/images/example.gif',
    'imgDir' => dirname(__DIR__).'/temp/images/',
    'tempQRcodeDir' => dirname(__DIR__).'/temp/tempQRcode/',
];

$res = PhpQrcode::QRcodePng($data);

if($res['status']){
    echo '----------二维码生成成功------------';
}else{
    echo '----------二维码生成失败------------';
}