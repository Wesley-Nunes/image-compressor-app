<?php
function compressImage($originalImagePath, $compressedImagePath)
{
    $originalImage = imagecreatefromjpeg($originalImagePath);
    imagejpeg($originalImage, $compressedImagePath, 80);
    imagedestroy($originalImage);
}
?>