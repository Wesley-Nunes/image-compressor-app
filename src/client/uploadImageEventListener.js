const uploadImageBtn = document.querySelector(".upload-image-btn");

const openFileDialog = () => {
  const input = document.querySelector("#upload-image-input");
  input.click();
};

const handleActions = (e) => {
  if (e.type === "click" || (e.type === "keydown" && e.key === "Enter")) {
    openFileDialog();
  }
};

uploadImageBtn.addEventListener("click", handleActions);
uploadImageBtn.addEventListener("keydown", handleActions);
