
function toggleEmployeeInfo() {
    const roleSelect = document.getElementById(".rol");
    const employeeInfo = document.getElementById(".employee-info");
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

document.querySelector(".next").addEventListener("click", adressInfoOnScreen);
document.querySelector(".back").addEventListener("click", userInfoOnScreen);