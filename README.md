
## 生成动态图的二维码

### 环境要求
1. php_GD 库扩展
2. php_imagick 扩展
3. ImageMagick 软件

### 包使用方式

```
use PhpQrcode\PhpQrcode;

$data = [
    'content' => 'https://github.com/overlordz',
    'bgPic' => dirname(__DIR__).'/src/assets/images/example.gif',
    'imgDir' => dirname(__DIR__).'/temp/images/',
    'tempQRcodeDir' => dirname(__DIR__).'/temp/tempQRcode/',
];

$res = PhpQrcode::QRcodePng($data);

```
**字段标注**

- content => 二维码内容
- bgPic => 背景图片
- imgDir => 生成合成图片的目录地址
- tempQRcodeDir => 生成临时二维码的图片信息

### 效果图如下：

![8b858c9601cedeb50d6a025ce1dfec30](./temp/images/8b858c9601cedeb50d6a025ce1dfec30.gif)