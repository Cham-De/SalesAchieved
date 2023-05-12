const popupbuttons = document.querySelectorAll(".popup-btn");
popupbuttons.forEach((pb) => {
  pb.addEventListener("click", () => {
    const popupId = pb.getAttribute("popup-target");
    const popup = document.querySelector(`#${popupId}`);
    if (popup) {
      popup.classList.toggle("active");
      popup.addEventListener("click", (e) => {
        popup.classList.remove("active");
      });
      const popupCloseBtn = document.querySelector(
        `#${popupId} .container #close-btn`
      );
      const popupContainer = document.querySelector(`#${popupId} .container`);
      if (popupContainer) {
        popupContainer.addEventListener("click", (e) => {
          e.stopPropagation();
        });
      }
      if (popupCloseBtn) {
        popupCloseBtn.addEventListener("click", () => {
          popup.classList.remove("active");
        });
      }
    }
  });
});
