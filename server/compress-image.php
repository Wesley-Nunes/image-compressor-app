<?php
function compressImage($originalImagePath, $compressedImagePath)
{
    $img = null;
    $mimeType = image_type_to_mime_type(exif_imagetype($originalImagePath));

    if ($mimeType == 'image/jpeg') {
        $img = imagecreatefromjpeg($originalImagePath);
        imagejpeg($img, $compressedImagePath, 80);
    } elseif ($mimeType == 'image/png') {
        $img = imagecreatefrompng($originalImagePath);
        imageAlphaBlending($img, true);
        imageSaveAlpha($img, true);
        imagepng($img, $compressedImagePath, 8);
    } elseif ($mimeType == 'image/webp') {
        $img = imagecreatefromwebp($originalImagePath);
        imageSaveAlpha($img, true);
        imagewebp($img, $compressedImagePath, 80);
    }

    imagedestroy($img);
}
?>