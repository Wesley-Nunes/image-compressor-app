<?php
function deleteImage($imagePath)
{
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}
?>