<?php
function compressImage($originalImagePath, $compressedImagePath)
{
    $originalImage = null;
    $mimeType = image_type_to_mime_type(exif_imagetype($originalImagePath));

    if ($mimeType == 'image/jpeg') {
        $originalImage = imagecreatefromjpeg($originalImagePath);
        imagejpeg($originalImage, $compressedImagePath, 80);
    } elseif ($mimeType == 'image/png') {
        $originalImage = imagecreatefrompng($originalImagePath);
        imagepng($originalImage, $compressedImagePath, 9);
    } elseif ($mimeType == 'image/webp') {
        $originalImage = imagecreatefromwebp($originalImagePath);
        imagewebp($originalImage, $compressedImagePath, 80);
    }



    imagedestroy($originalImage);
}
?>