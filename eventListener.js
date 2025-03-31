//add event listener to call diceRollAndUpdate on enter
document
  .getElementById("numSides")
  .addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("roll-button").click();
    }
  });
