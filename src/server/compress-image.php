<?php
function compressImage($originalImagePath, $compressedImagePath)
{
    $img = null;
    $mimeType = image_type_to_mime_type(exif_imagetype($originalImagePath));

    if ($mimeType == 'image/jpeg') {
        $img = imagecreatefromjpeg($originalImagePath);
        $quality = 80;
        imagejpeg($img, $compressedImagePath, $quality);
    } elseif ($mimeType == 'image/png') {
        $img = imagecreatefrompng($originalImagePath);
        $quality = 8;
        imageAlphaBlending($img, true);
        imageSaveAlpha($img, true);
        imagepng($img, $compressedImagePath, $quality);
    } elseif ($mimeType == 'image/webp') {
        $img = imagecreatefromwebp($originalImagePath);
        $quality = 80;
        imageSaveAlpha($img, true);
        imagewebp($img, $compressedImagePath, $quality);
    }

    imagedestroy($img);
}
?>