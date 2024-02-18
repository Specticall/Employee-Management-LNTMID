const resetBtn = document.querySelector(".reset-button");
const formEl = document.querySelector(".form-card");

const handleResetForm = (e) => {
    e.preventDefault();
    formEl.reset();
};

resetBtn.addEventListener("click", handleResetForm);
