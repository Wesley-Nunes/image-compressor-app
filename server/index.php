<?php
include 'compress-image.php';
include 'download-image.php';
include 'delete-image.php';
// include 'error-message.php';

define('UPLOAD_DIR', './temp/image-upload/');
define('COMPRESS_DIR', './temp/image-compressed/');
define('MAX_ALLOWED_SIZE_MB', 10);

try {
    if (!isset($_FILES['image'])) {
        $errorMessage = 'No image file selected for upload';
        throw new Exception($errorMessage);
    }
    if (!$_FILES['image']['size']) {
        $errorMessage = 'The upload file has no data';
        throw new Exception($errorMessage);
    }

    $uploadImagePath = UPLOAD_DIR . basename($_FILES['image']['name']);
    $compressImagePath = COMPRESS_DIR . basename($uploadImagePath);
    $moveUploadImageFail = !move_uploaded_file($_FILES['image']['tmp_name'], $uploadImagePath);

    if ($moveUploadImageFail) {
        $errorMessage = 'An error occur when trying to upload';
        throw new Exception($errorMessage);
    }
    if (!exif_imagetype($uploadImagePath)) {
        $errorMessage = 'The upload file is not a valid image';
        throw new Exception($errorMessage);
    }
    $fileSizeInMB = floatval($_FILES['image']['size'] / (1024 * 1024));
    if ($fileSizeInMB > MAX_ALLOWED_SIZE_MB) {
        $errorMessage = 'The file you attempted to upload exceeds the maximum allowed size of 10MB';
        throw new Exception($errorMessage);
    }
    $allowedFormats = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($_FILES['image']['type'], $allowedFormats)) {
        $errorMessage = "Unsupported file format \nAccepted formats: JPG, PNG, GIF, or WebP";
        throw new Exception($errorMessage);
    }
    compressImage($uploadImagePath, $compressImagePath);
    downloadImage($compressImagePath);
} catch (Exception $e) {
    // erroMessageTemplate($e->getMessage());
} catch (Throwable $t) {
    // erroMessageTemplate("Unexpected error occurred: " . $t->getMessage());
} finally {
    deleteImage($uploadImagePath);
    deleteImage($compressImagePath);
}
exit(1);
?>