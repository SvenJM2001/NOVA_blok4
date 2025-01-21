
var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
setInterval(setTime, 1000);

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
    const roleSelect = document.getElementById(".rol");
    const employeeInfo = document.getElementById(".werknemer-info");
    if (roleSelect.value === "werknemer") {
        employeeInfo.style.display = "block";
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

function logoutOnScreen(){
    document.querySelector(".loguit_veld").style.display = "block";
}
function logoutOffScreen(){
    document.querySelector(".loguit_veld").style.display = "none";
}

function zekerheidsCheckOnScreen(){
    document.querySelector(".loguit_button").style.display = "none";
    document.querySelector(".zekerheids_check").style.display = "flex";
}

function zekerheidsCheckOffScreen(){
    document.querySelector(".loguit_button").style.display = "block";
    document.querySelector(".zekerheids_check").style.display = "none";
}

document.querySelector(".uitloggen").addEventListener("click",logoutOnScreen);
document.querySelector(".loguit_weg").addEventListener("click",logoutOffScreen);
document.querySelector(".loguit_button").addEventListener("click", zekerheidsCheckOnScreen);
document.querySelector(".niet_zeker").addEventListener("click", zekerheidsCheckOffScreen);
document.querySelector(".next").addEventListener("click", adressInfoOnScreen);
document.querySelector(".back").addEventListener("click", userInfoOnScreen);