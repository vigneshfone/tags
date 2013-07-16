<?php
define('UPLOAD_FOLDER', "upload/");
define('WATERMARK_IMAGE', 'overlay.png');
define('WATERMARK_FA', 'fa.png');
$RawImage = 'watermark/DSC02607.png';
$imageSize = getimagesize($RawImage);
 // Create a 300x100 image
$stamp = imagecreatefrompng(WATERMARK_FA);
 $im = imagecreatetruecolor($imageSize[0], $imageSize[1]/2);
$red = imagecolorallocatealpha($im, 0, 76, 153, 100);
$black = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
imageSaveAlpha($im, true);
imagealphablending($im, true);
// Make the background red
//imagefilledrectangle($im, 0, 0, 299, 99, $red);
imagefill($im, 0, 0, $red);
imagecopy($im, $stamp, imagesx($im) - imagesx($stamp),  0 - 0, 0, 0, imagesx($stamp), imagesy($stamp));
// Path to our ttf font file
$font_file = 'futura_condensed.ttf';

$text = "MICROMAX CANVAS 4 A210 UNBOXING";
$lines = explode('|', wordwrap($text, 23, '|'));
$x = (imagesx($im)/4);
$y = imagesy($im)/2;
// Draw the text 'PHP Manual' using font size 13
if(count($lines) == 2){
$top = 50;
}else{
$top = 0;
}

foreach ($lines as $line)
{
imagefttext($im, 95, 0, $x, $y-$top, $black, $font_file, $line);
$y+=150;
$x+=23*15;
}
// Output image to the browser
header('Content-Type: image/png');
imagepng($im, "output.png");
ApplyWatermark('upload/2013-07-11/DSC02607.png','png','output.png');

//imagedestroy($im); 
echo 'Success';
function ApplyWatermark($image,$extension,$water)
{
// Load the stamp and the photo to apply the watermark to
$RawImage = 'watermark/'.basename($image);
copy($image,$RawImage);
    $stamp = imagecreatefrompng($water);
    switch ($extension) {
        case 'jpg':
            $im = imagecreatefromjpeg($RawImage);
            break;
        case 'jpeg':
            $im = imagecreatefromjpeg($RawImage);
            break;
        case 'png':
            $im = imagecreatefrompng($RawImage);
            break;
        case 'gif':
            $im = imagecreatefromgif($RawImage);
            break;
        default:
            $im = imagecreatefromjpeg($RawImage);
    }


// Set the margins for the stamp and get the height/width of the stamp image
    $marge_left = 0;
    $marge_top = 100;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
$black = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
// Path to our ttf font file
$font_file = 'futura_condensed.ttf';
$imageSize = getimagesize($RawImage);
//$newWatermarkWidth = $imageSize[0]-50;
// Copy the stamp image onto our photo using the margin offsets and the photo
// width to calculate positioning of the stamp.
    imagecopy($im, $stamp, $marge_left,  $imageSize[1]/2-imagesy($stamp)/2, 0, 0, imagesx($stamp), imagesy($stamp));
	/* $success = imagecopyresized($im,                 // Destination image
           $stamp,                              // Source image
           $imageSize[0]/2 - $newWatermarkWidth/2,  // Destination X
           $imageSize[1]/2 - imagesy($stamp)/2, // Destination Y
           0,                                       // Source X
           0,                                       // Source Y
           $newWatermarkWidth,                      // Destination W
           imagesy($stamp),                     // Destination H
           imagesx($stamp),                     // Source W
           imagesy($stamp));   */
	//imagefttext($im, 30, 0, $imageSize[0]/2, $imageSize[1]/2, $black, $font_file, 'PHP Manual');
// Output and free memory
    //header('Content-type: image/png');
   // ob_start();
// output jpeg (or any other chosen) format & quality


 imagepng($im, NULL, 9);
// capture output to string
//    $contents = ob_get_contents();
//// end capture
//    ob_end_clean();
////imagepng($im);
//    imagedestroy($im);
//    $fh = fopen($RawImage, "w" );
//    fwrite( $fh, $contents );
//    fclose( $fh );
}
 /*
$tekst = "This is a test message";

$h = 9;

$size = imageTTFBBox($h, 0, "futura_condensed.ttf", $tekst);
$image = imageCreateTrueColor(abs($size[2]) + abs($size[0]), abs($size[7]) + abs($size[1]));
imageSaveAlpha($image, true);
ImageAlphaBlending($image, false); 

$tlo = imagecolorallocatealpha($image, 203, 0, 0, 100);
imagefill($image, 0, 0, $tlo);

$napis = imagecolorallocate($image, 220, 220, 220);
imagettftext($image, $h, 0, 0, abs($size[5]), $napis, "futura_condensed.ttf", $tekst);
imagepng($image, "output.png");
imagedestroy($image);*/

?><!-- <html>
<head>
</head>
<body >
<img src="output.png" alt="">
</body>
</html> -->