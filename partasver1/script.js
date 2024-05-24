//Switching theme icon
var icon = document.getElementById("icon");
icon.onclick = function() { //activates switch the function
  document.body.classList.toggle("dark-theme");
  if (document.body.classList.contains("dark-theme")) {
    icon.src = "Img/sun.png";
  }
  else {
    icon.src = "Img/moon.png";
  }//switching of image icon
}



//Buttton Form Animation
const container = document.getElementById('container');
const nextBtn = document.getElementById('next-btn');
const prevBtn = document.getElementById('prev-btn');

nextBtn.addEventListener('click', () => {
  container.classList.add("active");
});

prevBtn.addEventListener('click', () => {
  container.classList.remove("active");
});



//time and date
function updateTime() {
  const now = new Date();

  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  const seconds = now.getSeconds().toString().padStart(2, '0');

  const dateString = `${hours}:${minutes}:${seconds}`;

  const timeElement = document.getElementById('time');
  timeElement.textContent = `Current time: ${dateString}`;

  const dateElement = document.getElementById('date');
  dateElement.textContent = `Date: ${now.toLocaleDateString()}`;
}

setInterval(updateTime, 1000);
updateTime();


// Get the 'origin' and 'destination' dropdowns
var origin = document.getElementById('origin');
var destination = document.getElementById('des');

// Add an event listener for the 'change' event on the 'origin' dropdown
origin.addEventListener('change', function(event) {
  // Get the selected value of the 'origin' dropdown
  var originValue = origin.value;
  // If the selected value of the 'origin' dropdown is the same as the value of the 'destination' dropdown
  if (originValue === destination.value) {
    // Clear the value of the 'destination' dropdown
    destination.value = '';
    // Display an error message
    alert('Sorry, You must have chosen an invalid destination.');
  }
});

// Add an event listener for the 'change' event on the 'destination' dropdown
destination.addEventListener('change', function(event) {
  // Get the selected value of the 'origin' dropdown
  var originValue = origin.value;
  // If the selected value of the 'destination' dropdown is the same as the value of the 'origin' dropdown
  if (destination.value === originValue) {
    // Clear the value of the 'destination' dropdown
    destination.value = '';
    // Display an error message
    alert('Sorry, You must have chosen an invalid destination.');
  }
});



// Form submission handler
document.getElementById('ticketing-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission

  // Get the dropdown elements
  var origin = document.getElementById('origin');
  var destination = document.getElementById('des');


  // Check if both dropdowns have a selected value
  if (origin.value === '' || destination.value === '') {
    alert('Please select both origin and destination.');
  }
  else {
    // Create a FormData object to gather form data
    var formData = new FormData(this);
    var missingInputs = [];

    // Check for any missing input values
    for (var pair of formData.entries()) {
      if (pair[1] === '' || (pair[0] === 'select-element-name' && pair[1] === 'Select an option')) {
        missingInputs.push(pair[0]);
      }
    }

    // If no missing inputs, send the form data using AJAX
    if (missingInputs.length === 0) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'back.php'); // Adjust the URL if needed
      xhr.send(formData);
      xhr.onload = function() {
        if (xhr.status === 200) {
          console.log('Form submitted successfully:', xhr.responseText);
          window.location.href = 'ticket.php'; // Redirect to ticket.php
        } else {
          console.error('Error during form submission:', xhr.statusText);
          alert('An error occurred while submitting the form. Please try again.');
        }
      };
      xhr.onerror = function() {
        console.error('Error during form submission:', xhr.statusText);
        alert('An error occurred while submitting the form. Please try again.');
      };
    } else {
      // Prevent form submission and alert the user about missing inputs
      event.preventDefault();
      var missingInputsString = missingInputs.join(', ');
      alert('Please fill out the following missing inputs: ' + missingInputsString);
    }
  }
});


document.addEventListener('DOMContentLoaded', () => {
  const submitBtn = document.getElementById('submit');
  const formElements = Array.from(document.querySelectorAll('#ticketing-form input[required]'));

  // Hide the submit button initially
  submitBtn.style.display = 'none';

  // Add input event listeners to all form elements
  formElements.forEach(element => {
    element.addEventListener('input', checkFormCompletion);
  });

  function checkFormCompletion() {
    // Check if all input elements are filled
    const allFilled = formElements.every(el => el.value.trim() !== '');
    // Show or hide the submit button based on form completion
    submitBtn.style.display = allFilled ? 'block' : 'none';
  }

  // Initial check in case the form is pre-filled
  checkFormCompletion();
});




