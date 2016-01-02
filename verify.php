<?
header ("content-type: image/png");
header('Expires:   0');
header('Cache-Control:   no-store,   no-cache,   must-revalidate,   pre-check=0,   post-check=0,   max-age=0');   //  HTTP/1.1
header('Pragma:   no-cache');   // HTTP/1.0   
session_start();
function getCode ($length = 32, $mode = 0)
{
    switch ($mode)
    {
        case '1':
            $str = '1234567890';break;
        case '2':
            $str = 'abcdefghijklmnopqrstuvwxyz';break;
        case '3':
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';break;
        case '4':
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';break;
        case '5':
            $str = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';break;
        case '6':
            $str = 'abcdefghijklmnopqrstuvwxyz123456789';break;
        default:
            $str = 'ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz123456789';
        break;
    }

    $result = '';
    $l = strlen($str)-1;
    for($i = 0;$i < $length;$i ++){
        $num = rand(0, $l);
        $result .= $str[$num];
    }
    return $result;
}
function createAuthNumImg($randStr,$imgW=100,$imgH=40,$fontName)
{
    $image = imagecreate($imgW , $imgH);
    
    $color_white = imagecolorallocate($image , 255 , 255 , 255);
    $color_gray  = imagecolorallocate($image , 228 , 228 , 228);
    $color_black = imagecolorallocate($image , 255 , 102 , 204);
    $color_radom = imagecolorallocate($image , rand(1,200) , rand(1,200) , rand(10,250));
    
    for ($i = 0 ; $i < 2000 ; $i++)
    {
    	$c = imagecolorallocate($image , rand(1,200) , rand(1,200) , rand(10,250));
        imagesetpixel($image , mt_rand(0 , $imgW) , mt_rand(0 , $imgH) , $c);//添加杂点
    }
    imagerectangle($image , 0 , 0 , $imgW - 1 , $imgH - 1 , $color_gray);
    imagettftext($image,50,mt_rand(-2,2),rand(0,20),50,$color_radom,$fontName,$randStr);
    for ($i=10;$i<$imgH;$i+=10)imageline($image, 0, $i, $imgW, $i, $color_gray);//画横线
	for ($i=10;$i<$imgW;$i+=10)imageline($image, $i, 0, $i, $imgH, $color_gray);//画竖线
    imagepng($image);
    imagedestroy($image);
}
$str=GetCode(5,1);

$_SESSION['VerifyCode']=md5(strtoupper($str));
createAuthNumImg($str,250,50,"includes/3dlet.ttf");
?>