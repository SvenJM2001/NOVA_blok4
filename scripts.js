
var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
const employeeInfo = document.getElementById("werknemer-info");
const rolElement = document.getElementById("rol");

window.onload = checkSessionStatus;

function checkSessionStatus() {
    fetch('sessie_status.php')
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn) {
                // Als de gebruiker ingelogd is, verberg de login-knop en toon de logout-knop
                document.getElementById('login-button').style.display = 'none';
                document.getElementById('logout-button').style.display = 'block';
                console.log ("ingelogd")
            } else {
                // Als de gebruiker niet ingelogd is, verberg de logout-knop en toon de login-knop
                document.getElementById('login-button').style.display = 'block';
                document.getElementById('logout-button').style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error fetching session status:', error);
        });
}

function setTime() {
  ++totalSeconds;
  secondsLabel.innerHTML = pad(totalSeconds % 60);
  minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
}

function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}



function toggleEmployeeInfo() {
    console.log ("wordt aangeroepen")
    let rolValue = rolElement.value;
    console.log (rolValue)
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
    console.log ("werkt"); 
}

function userInfoOnScreen(){
    document.querySelector(".user_info").style.display = "flex";
    document.querySelector(".adress_info").style.display = "none";  
    document.querySelector(".register_submit").style.display = "none";
    document.querySelector(".back").style.display = "none";
    document.querySelector(".next").style.display = "block";
    console.log ("werkt"); 
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

setInterval(setTime, 1000);

document.getElementById("rol").addEventListener("change", toggleEmployeeInfo);

document.querySelector(".next").addEventListener("click", adressInfoOnScreen);
document.querySelector(".back").addEventListener("click", userInfoOnScreen);
document.querySelector(".loguit_button").addEventListener("click", zekerheidsCheckOnScreen);
document.querySelector(".niet_zeker").addEventListener("click", zekerheidsCheckOffScreen);


