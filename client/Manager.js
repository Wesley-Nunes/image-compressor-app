const Manager = (() => {
  const imageCard = document.querySelector(".content");
  const textContainer = imageCard.querySelector(".text-content");
  const btn = imageCard.querySelector(".upload-image-btn");
  const loading = imageCard.querySelector(".loading-container");
  const errorContainer = document.querySelector(".error-container");
  const errorTextField = errorContainer.querySelector(".error-message");
  let internalState;
  let intervalIds = [];

  const resetCookiesValue = () => {
    document.cookie = "downloadImage=false";
    document.cookie = "errorMessage=";
  };
  const clearIntervalIds = () => {
    intervalIds.forEach((id) => clearInterval(id));
    intervalIds = [];
  };
  const applyStyles = (display) => {
    const isError = getState() === "error";
    imageCard.classList.toggle("disable-content", isError);
    errorContainer.style.visibility = isError ? "visible" : "hidden";
    textContainer.style.visibility = isError ? "hidden" : "visible";

    loading.style.display = display;
    btn.style.display = display === "none" ? "flex" : "none";
  };
  const setErrorMessage = () => {
    const errorMessage = document.cookie
      .split("; ")
      .find((row) => row.startsWith("errorMessage="))
      ?.split("=")[1]
      .replace(/%20/g, " ");
    errorTextField.textContent = errorMessage;
  };
  const getState = () => {
    return internalState;
  };
  const setState = (newState) => {
    internalState = newState;
  };
  const searchForCookie = (cookieName) => {
    const cookies = document.cookie;
    const regex = new RegExp(cookieName + "=([^;]*)", "i");
    const cookie = cookies.match(regex) || [];
    return cookie[1];
  };
  const hasError = () => {
    return searchForCookie("errorMessage");
  };
  const isDownloadFinished = () => {
    const downloadImage = searchForCookie("downloadImage");
    return downloadImage === "true";
  };
  const setIdleState = () => {
    setState("idle");
    resetCookiesValue();
    setErrorMessage();
    clearIntervalIds();
    applyStyles("none");
  };
  const setLoadingState = () => {
    const checkForErros = () => {
      if (hasError()) {
        setErrorState();
      }
    };
    const downloadingImage = () => {
      if (isDownloadFinished()) {
        setIdleState();
      }
    };

    setState("loading");
    applyStyles("flex");

    const errorIntervalId = setInterval(checkForErros, 500);
    const downloadImageIntervalId = setInterval(downloadingImage, 500);
    intervalIds.push(errorIntervalId);
    intervalIds.push(downloadImageIntervalId);
  };
  const setErrorState = () => {
    setState("error");
    setErrorMessage();
    clearIntervalIds();
    applyStyles();
  };

  hasError() && setErrorState();

  return {
    getState,
    setState,
    setIdleState,
    setLoadingState,
    setErrorState,
  };
})();
