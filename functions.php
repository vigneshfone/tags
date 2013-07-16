<?php
include 'constants.php';

function ApplyWatermark($image,$text,$action,$gameName)
{
// Load the stamp and the photo to apply the watermark to
$RawImage = 'watermark/'.basename($image);
copy($image,$RawImage);
    $stamp = imagecreatefrompng(WATERMARK_IMAGE);
    $im = imagecreatefrompng($RawImage);
// Set the margins for the stamp and get the height/width of the stamp image
    $marge_left = 0;
   // $marge_top = 100;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
    $black = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
// Path to our ttf font file
    $font_file = 'futura_condensed.ttf';
    $imageSize = getimagesize($RawImage);

    imagecopy($im, $stamp, $marge_left,  $imageSize[1]/2-imagesy($stamp)/2, 0, 0, $sx, $sy);
    //$text = "MICROMAX CANVAS 4 A210 UNBOXING";
    if($action == "VIDEO SAMPLE"){
        $lines = array($action,"OF",$text);
    }  else {
        if(!empty($gameName)){
            $lines = array($text,$gameName." ".$action);
        }  else {
            $lines = array($text,$action);
        }
    }

$x = $imageSize[0]/5;
$y = $imageSize[1]/2;

$top = 50;
$fontSize = 120;
$i=0;
$len= count($lines);
if($len == 3){
    //$fontSize = 95;
    $top = 120;
    
}
foreach ($lines as $line)
{
$text_box = imagettfbbox($fontSize,0,$font_file,$line);
$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
$text_height = $text_box[3]-$text_box[1];
$x = ($imageSize[0]/2) - ($text_width/2);
$y = ($imageSize[1]/2) - ($text_height/2);

if($len == 3){
    if ($i==1) {
        $y+=150;  
    }
    if ($i==2) {
    $y+=300;
    //$fontSize = 120;
    }
}else{
    if($i==1){
        $y+=200;
    }    
}

imagefttext($im, $fontSize, 0, $x, $y-$top, $black, $font_file, $line);
$i++;
}

    //header('Content-type: image/png');
    ob_start();
    imagepng($im, NULL, 9);
// capture output to string
    $contents = ob_get_contents();
// end capture
    ob_end_clean();
//imagepng($im);
    imagedestroy($im);
    $fh = fopen($RawImage, "w" );
    fwrite( $fh, $contents );
    fclose( $fh );
}
function ApplyComparisonWatermark($image,$text,$text2)
{
// Load the stamp and the photo to apply the watermark to
$RawImage = 'watermark/'.basename($image);
copy($image,$RawImage);
    $stamp = imagecreatefrompng(WATERMARK_IMAGE);
    $im = imagecreatefrompng($RawImage);
// Set the margins for the stamp and get the height/width of the stamp image
    $marge_left = 0;
    //$marge_top = 100;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
    $black = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
// Path to our ttf font file
    $font_file = 'futura_condensed.ttf';
    $imageSize = getimagesize($RawImage);

    imagecopy($im, $stamp, $marge_left,  $imageSize[1]/2-imagesy($stamp)/2, 0, 0, $sx, $sy);
    //$text = "MICROMAX CANVAS 4 A210 UNBOXING";
    $lines = array($text,"VS",$text2);


$x = $imageSize[0]/5;
$y = $imageSize[1]/2;

$top = 120;
$fontSize = 120;
$i=0;

foreach ($lines as $line)
{
$text_box = imagettfbbox($fontSize,0,$font_file,$line);
$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
$text_height = $text_box[3]-$text_box[1];
$x = ($imageSize[0]/2) - ($text_width/2);
$y = ($imageSize[1]/2) - ($text_height/2);

    if ($i==1) {
        $y+=150;  
    }
    if ($i==2) {
    $y+=300;
    //$fontSize = 120;
    }


imagefttext($im, $fontSize, 0, $x, $y-$top, $black, $font_file, $line);
$i++;
}

    //header('Content-type: image/png');
    ob_start();
    imagepng($im, NULL, 9);
// capture output to string
    $contents = ob_get_contents();
// end capture
    ob_end_clean();
//imagepng($im);
    imagedestroy($im);
    $fh = fopen($RawImage, "w" );
    fwrite( $fh, $contents );
    fclose( $fh );
}

function ApplyWatermarkResize($RawImage,$extension)
{
// Load the stamp and the photo to apply the watermark to
    $stamp = imagecreatefrompng(WATERMARK);
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
    $marge_right = 10;
    $marge_bottom = 10;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo
// width to calculate positioning of the stamp.
    imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy -   $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
    //header('Content-type: image/png');
    ob_start();
// output jpeg (or any other chosen) format & quality
    switch ($extension) {
        case 'jpg':
            imagejpeg($im, NULL, 100);
            break;
        case 'jpeg':
            imagejpeg($im, NULL, 100);
            break;
        case 'png':
            imagepng($im, NULL, 9);
            break;
        case 'gif':
            imagejpeg($im, NULL, 100);
            break;
        default:
            imagejpeg($im, NULL, 100);
    }


// capture output to string
    $contents = ob_get_contents();
// end capture
    ob_end_clean();
//imagepng($im);
    imagedestroy($im);
    $fh = fopen($RawImage, "w" );
    fwrite( $fh, $contents );
    fclose( $fh );
}

function format_size($size) {
      $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
      if ($size == 0) { return('n/a'); } else {
      return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]); }
}
     
?>