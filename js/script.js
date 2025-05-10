function noSpace(event) {
  if (event.key === " ") {
    return false; // Block space key
  }
  return true;
}

function noNumber(event) {
  if (event.key >= "0" && event.key <= "9") {
    return false; // Block number keys
  }
  return true;
}

function noLetter(event) {
  if ((event.key >= "a" && event.key <= "z") || (event.key >= "A" && event.key <= "Z")) {
    return false; // Block letter keys
  }
  return true;
}

function noSpaceOrLetter(event) {
  // Check if the key is a letter (A-Z or a-z)
  if ((event.key >= "a" && event.key <= "z") || (event.key >= "A" && event.key <= "Z") || event.key === " ") {
    return false; // Block letter and space keys
  }
  return true; // Allow other keys (numbers, special characters, etc.)
}

function noNumberOrSymbol(event) {
  const key = event.key;

  // Block numbers (0-9) and symbols (anything other than letters)
  if (
    (key >= "0" && key <= "9") ||      // Block numbers (0-9)
    !key.match(/[a-zA-Z]/)              // Block symbols (anything that's not a letter)
  ) {
    return false; // Block the key
  }
  return true; // Allow letters (a-z, A-Z)
}

function noLetterOrSymbol(event) {
  const key = event.key;
  
  // Block letters (A-Z, a-z) and non-numeric symbols (anything other than digits)
  if (
    (key >= "a" && key <= "z") ||    // Block lowercase letters
    (key >= "A" && key <= "Z") ||    // Block uppercase letters
    !key.match(/[0-9]/)              // Block non-numeric characters (symbols, spaces)
  ) {
    return false; // Block the key
  }
  return true; // Allow numbers (0-9)
}


function goBack() {
  window.history.back();
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

document
  .getElementById("loginButton")
  .addEventListener("click", function (event) {
    event.preventDefault(); // Prevent default form submission

    let btn = this;
    let loader = document.getElementById("loader");
    let buttonText = document.getElementById("buttonText");
    let form = document.querySelector(".needs-validation"); // Ensure the form has this class

    // Check form validity
    if (!form.checkValidity()) {
      form.classList.add("was-validated"); // Apply Bootstrap validation styles
      return; // Stop submission if invalid
    }

    // If valid, disable button and show loader
    btn.disabled = true;
    loader.classList.remove("d-none");
    buttonText.textContent = "Signing in ...";

    // Submit the form after a slight delay
    setTimeout(() => {
      form.submit();
    }, 1000);
  });

function updateCharCount() {
  const input = document.getElementById("name");
  const count = input.value.length;
  document.getElementById("charCount").textContent = count;
}

// Optional: initialize on page load if input has value
window.onload = updateCharCount;

function updateCharTextCount() {
  const input = document.getElementById("medicalRecord");
  const count = input.value.length;
  document.getElementById("charTextAreaCount").textContent = count;
}

// Optional: initialize on page load if input has value
window.onload = updateCharTextCount;