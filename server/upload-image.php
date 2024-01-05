<?php
include 'compress-image.php';
include 'download-image.php';
include 'delete-image.php';

define('UPLOAD_DIR', './temp/image-upload/');
define('COMPRESS_DIR', './temp/image-compressed/');
define('MAX_ALLOWED_SIZE_MB', 10 * 1024 * 1024);

try {
    if (!isset($_FILES['upload-image'])) {
        $errorMessage = 'No image file was selected for upload';
        throw new Exception($errorMessage);
    }
    if (!$_FILES['upload-image']['size']) {
        $errorMessage = 'The upload file has no data';
        throw new Exception($errorMessage);
    }

    $uploadImagePath = UPLOAD_DIR . basename($_FILES['upload-image']['name']);
    $compressImagePath = COMPRESS_DIR . basename($uploadImagePath);
    $moveUploadImageFail = !move_uploaded_file($_FILES['upload-image']['tmp_name'], $uploadImagePath);

    if ($moveUploadImageFail) {
        $errorMessage = 'An error occurs when trying to upload';
        throw new Exception($errorMessage);
    }
    if (!exif_imagetype($uploadImagePath)) {
        $errorMessage = 'The upload file is not a valid image';
        throw new Exception($errorMessage);
    }
    if (intval($_FILES['upload-image']['size']) > MAX_ALLOWED_SIZE_MB) {
        $errorMessage = 'File size exceeds 10 MB limit';
        throw new Exception($errorMessage);
    }
    $allowedFormats = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
    if (!in_array($_FILES['upload-image']['type'], $allowedFormats)) {
        $errorMessage = "Unsupported format: JPG, PNG, or WebP accepted";
        throw new Exception($errorMessage);
    }    
    compressImage($uploadImagePath, $compressImagePath, 0);
    downloadImage($compressImagePath);
} catch (Exception $e) {
    setcookie('errorMessage', $e->getMessage(), time() + 3600, '/');
    header("Location: /index.php");
} catch (Throwable $t) {
    setcookie('errorMessage', 'An unexpected error occurred: ' . $e->getMessage(), time() + 3600, '/');
    header("Location: /index.php");
} finally {
    deleteImage($uploadImagePath);
    deleteImage($compressImagePath);
}
exit(1);
?>