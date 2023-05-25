function confirmerSuppressionEvent(event) {
  event.preventDefault();
  const formulaire = event.target;
  const popupModal = document.querySelector("#popup-modal");
  popupModal.classList.remove("hidden");
  const deleteBtn = document.querySelector("#delete-btn");
  deleteBtn.addEventListener("click", () => {
    formulaire.submit();
  });
  const cancelBtn = document.querySelector("#cancel-btn");
  cancelBtn.addEventListener("click", () => {
    popupModal.classList.add("hidden");
  });
}

const formulaire = document.querySelector('#delete-form');
formulaire.addEventListener('submit', confirmerSuppressionEvent);
