const counterBtn = document.getElementById("counterBtn");
const incrementBtn = document.getElementById("incrementBtn");
const decrementBtn = document.getElementById("decrementBtn");

let counterValue = 0;

incrementBtn.addEventListener("click", () => {
  if (counterValue < 10) {
    counterValue++;
    counterBtn.textContent = counterValue;
  }
});

decrementBtn.addEventListener("click", () => {
  if (counterValue > 0) {
    counterValue--;
    counterBtn.textContent = counterValue;
  }
});
