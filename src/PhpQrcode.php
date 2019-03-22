<?php

namespace PhpQrcode;

use PhpQrcode\lib\QRcode;

include 'config/const.php';

class PhpQrcode
{
    // 生成gif二维码
    public static function QRcodePng($data)
    {
        $config = [
            'data'  => $data['url'],
            'level' => 'L',    //支持二维码容错率，动图时建议提高容错率能提高识别率
            'size'  => 300,
            'mode'  => 'background',
            'alpha' =>  1,//背景填充颜色，1半透明；2全透明。半透明可以提高识别度，但是会使背景原图变灰
            'other' => [
                'filePath' => $data['bgPic'],
                'char' => '██',
                'saveDir' => $data['tempQRcodeDir'],
            ]
        ];
        // 目录不存在
        if(is_dir($data['imgDir']) === false || is_dir($data['tempQRcodeDir']) === false){
            return false;
        }
        // 文件不存在
        if (is_file($config['other']['filePath']) === false) {
            return false;
        }
        // 文件格式有误
        if (exif_imagetype($config['other']['filePath']) === false) {
            return false;
        }
        $fileInfo = pathinfo($config['other']['filePath']);
        // 输出文件路径
        $outFile = $data['imgDir']. md5($fileInfo['filename'] . time()) . '.' . $fileInfo['extension'];
        $qrHander = QRcode::png($config['data'], $outFile, $config['level'], $config['size']/25, 0, $saveandprint = false, $config['mode'], $config['other'],$config['alpha']);

        if ($qrHander){
            return true;
        }else{
            return false;
        }
    }

}