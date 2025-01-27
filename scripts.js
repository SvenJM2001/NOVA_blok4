
var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
const employeeInfo = document.getElementById("werknemer-info");
const rolElement = document.getElementById("rol");  
let minutes = 0;
let seconds = 0;
let timer;

function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}



function toggleEmployeeInfo() {
    let rolValue = rolElement.value;
    if (rolValue === "werknemer") {
        employeeInfo.style.display = "flex";
    } else {
        employeeInfo.style.display = "none";
    }
}


function adressInfoOnScreen(){
    document.querySelector(".user_info").style.display = "none";
    document.querySelector(".adress_info").style.display = "flex";  
    document.querySelector(".register_submit").style.display = "block";
    document.querySelector(".next").style.display = "none";
    document.querySelector(".back").style.display = "block";
    employeeInfo.style.display = "none";
}

function userInfoOnScreen(){
    document.querySelector(".user_info").style.display = "flex";
    document.querySelector(".adress_info").style.display = "none";  
    document.querySelector(".register_submit").style.display = "none";
    document.querySelector(".back").style.display = "none";
    document.querySelector(".next").style.display = "block";
    if (rolValue === "werknemer") {
        employeeInfo.style.display = "flex";
    } else {
        employeeInfo.style.display = "none";
    }
}

document.addEventListener("DOMContentLoaded", () => {
    // Get required elements
    const loguitButton = document.querySelector(".loguit_button");
    const zekerheidsCheck = document.querySelector(".zekerheids_check");
    const nietZekerButton = document.querySelector(".niet_zeker");

    // Check if elements exist
    if (!loguitButton || !zekerheidsCheck || !nietZekerButton) {
        console.error("One or more elements (.loguit_button, .zekerheids_check, .niet_zeker) are missing in the DOM.");
        return;
    }

    loguitButton.addEventListener("click", () => {
        loguitButton.style.display = "none";
        zekerheidsCheck.style.display = "flex";
    });

    nietZekerButton.addEventListener("click", () => {
        loguitButton.style.display = "block";
        zekerheidsCheck.style.display = "none";
    });
});


function checkLoginStatus() {
    fetch('sessie_status.php')
      .then(response => response.json())
      .then(data => {
        if (data.loggedIn) {
          startTimer();  // Start the timer if the user is logged in
        }
      })
      .catch(error => console.error('Error checking login status:', error));
  }
  
  
  // Function to start the timer
  function startTimer() {
    let timeElapsed = localStorage.getItem('timeElapsed') || 0; // Retrieve stored time or start from 0
  
    // Update the timer every second
    timer = setInterval(() => {
      timeElapsed++;
      minutes = Math.floor(timeElapsed / 60);
      seconds = timeElapsed % 60;
      document.getElementById('minutes').innerText = String(minutes).padStart(2, '0');
      document.getElementById('seconds').innerText = String(seconds).padStart(2, '0');
      localStorage.setItem('timeElapsed', timeElapsed); // Save the time to localStorage
    }, 1000);
  }
  
  // Function to handle user logout
  function logout() {
    localStorage.removeItem('timeElapsed'); // Clear the timer on logout
    fetch('loguit.php')  // Log the user out by calling the logout script
      .then(response => window.location.href = 'index.php'); // Redirect after logout
  }
  
  // Call checkLoginStatus when the page loads to check if the user is logged in
  
  // Handle logout button click
  const logoutButton = document.querySelector('.wel_zeker');
  if (logoutButton) {
    logoutButton.addEventListener('click', logout);
  }


document.addEventListener('DOMContentLoaded', checkLoginStatus);
document.getElementById("rol").addEventListener("change", toggleEmployeeInfo);

document.querySelector(".next").addEventListener("click", adressInfoOnScreen);
document.querySelector(".back").addEventListener("click", userInfoOnScreen);
document.querySelector(".loguit_button").addEventListener("click", zekerheidsCheckOnScreen);
document.querySelector(".niet_zeker").addEventListener("click", zekerheidsCheckOffScreen);


