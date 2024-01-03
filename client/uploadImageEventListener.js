uploadImageBtn = document.querySelector(".upload-image-btn");
uploadImageBtn.addEventListener("keydown", (e) => {
  if (e.key === "Enter") {
    i = document.querySelector("input");
    i.click();
  }
});