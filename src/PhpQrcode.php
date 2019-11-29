<?php
namespace PhpQrcode;

use PhpQrcode\lib\QRcode;

include 'config/const.php';

class PhpQrcode
{
    // 生成gif二维码
    public static function QRcodePng($data)
    {
        set_time_limit(0);
        $content = $data['content'];
        $level = 'L';//支持二维码容错率，动图时建议提高容错率能提高识别率
        $size = 12;
        $mode  = 'background';//背景填充颜色，1半透明；2全透明。半透明可以提高识别度，但是会使背景原图变灰
        $alph = 1;
        $other = [
            'filePath' => $data['bgPic'],
            'char'     => '██',
            'saveDir'  => $data['tempQRcodeDir'],
        ];


        if (is_dir($data['imgDir']) === false || is_dir($data['tempQRcodeDir']) === false) {
            return [
                'status' => 0,
                'msg'    => '保存目录不存在'
            ];
        }
        if (is_file($data['bgPic']) === false) {
            return [
                'status' => 0,
                'msg'    => '背景图片不存在'
            ];
        }
        if (exif_imagetype($data['bgPic']) === false) {
            return [
                'status' => 0,
                'msg'    => '背景图片文件格式有误'
            ];
        }
        $fileInfo = pathinfo($data['bgPic']);
        // 输出文件路径
        $outFile = $data['imgDir'] . md5($fileInfo['filename'] . time()) . '.' . $fileInfo['extension'];
        $qrHander = QRcode::png($content, $outFile, $level, $size, 0, $saveandprint = false, $mode, $other, $alph);
        if ($qrHander) {
            return [
                'status' => 1,
                'msg'    => '成功生成动态图的二维码',
                'data' => [
                    'imgAdress' => $outFile
                ]
            ];
        }
        else {
            return [
                'status' => 0,
                'msg'    => '图片文件生成失败'
            ];
        }
    }
}