<?php
function downloadImage($imagePath)
{
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($imagePath) . '"');
    setcookie('downloadImage', 'true', time() + 3600, '/');
    readfile($imagePath);
}
?>