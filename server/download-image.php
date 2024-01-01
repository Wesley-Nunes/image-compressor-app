<?php
function downloadImage($imagePath)
{
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($imagePath) . '"');
    readfile($imagePath);
}
?>