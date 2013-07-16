<?php

class ImgResizer {
    var $originalFile = '';

    function ImgResizer($originalFile = '') {
        $this -> originalFile = $originalFile;
    }
    function resize($newWidth, $targetFile, $extension) {
        if (empty($newWidth) || empty($targetFile)) {
            return false;
        }
        //$src = imagecreatefromjpeg($this -> originalFile);
        switch ($extension) {
            case 'jpg':
                $src = imagecreatefromjpeg($this -> originalFile);
                break;
            case 'jpeg':
                $src = imagecreatefromjpeg($this -> originalFile);
                break;
            case 'png':
                $src = imagecreatefrompng($this -> originalFile);
                break;
            default:
                $src = imagecreatefromjpeg($this -> originalFile);
        }
        list($width, $height) = getimagesize($this -> originalFile);
        $newHeight = ($height / $width) * $newWidth;
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        if (file_exists($targetFile)) {
            unlink($targetFile);
        }
        switch ($extension) {
            case 'jpg':
                imagejpeg($tmp, $targetFile, 100);
                break;
            case 'jpeg':
                imagejpeg($tmp, $targetFile, 100);
                break;
            case 'png':
                imagepng($tmp, $targetFile, 9);
                break;
            default:
                imagejpeg($tmp, $targetFile, 100);
        }
        //imagejpeg($tmp, $targetFile, 85);
    }
}
?>

