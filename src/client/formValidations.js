const setErrorMessage = (msg) => {
  document.cookie = `errorMessage=${msg}`;
};

const validateFile = (file) => {
  const maxSize = 10 * 1024 * 1024; // 10 MB
  const allowedTypes = ["image/png", "image/jpeg", "image/jpg", "image/webp"];

  if (file.size > maxSize) {
    setErrorMessage("File size exceeds 10 MB limit");
    return false;
  }

  if (!allowedTypes.includes(file.type)) {
    setErrorMessage("Unsupported format: JPG, PNG, or WebP accepted");
    return false;
  }

  return true;
};

document.addEventListener("DOMContentLoaded", () => {
  const uploadImageInput = document.querySelector("#upload-image-input");
  const uploadForm = document.querySelector("#uploadForm");

  uploadImageInput.addEventListener("change", () => {
    Manager.setLoadingState();

    if (uploadImageInput.files.length > 0) {
      const selectedFile = uploadImageInput.files[0];

      if (validateFile(selectedFile)) {
        uploadForm.submit();
      } else {
        Manager.setErrorState();
        uploadImageInput.value = "";
      }
    } else {
      setErrorMessage("An unexpected error occurred. Refreshing");
      Manager.setErrorState();
      setTimeout(() => Manager.setIdleState(), 2000);
    }
  });
});
