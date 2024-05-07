
var EmailField = document.getElementById("email-feild");
var EmailLabel = document.getElementById("email-label");
var EmailError = document.getElementById("email-error");


function validateEmail(){

        EmailLabel.style.bottom = "45px";

    if(!EmailField.value.match(/^[A-Za-z\._\-0-9]*[@][marwadiuniversity]*[\.][ac]*[\.][in]{2,4}$/)){
        EmailError.innerHTML = "please enter a valid email";
        EmailField.style.borderBottomColor = "red";
        return false;
    }

    EmailError.innerHTML = "";
    EmailField.style.borderBottomColor = "green";
    return true;
}


function checkPassword(){
    let password = document.getElementById("password").value;
    let cnfrmPassword = document.getElementById("cnfrm-password").value;
    console.log(" Password:", password,'\n',"Confirm Password:",cnfrmPassword);
    let message = document.getElementById("message");

    if(password.length != 0){
        if(password == cnfrmPassword){
            message.textContent = "Passwords match";
            message.style.backgroundColor = "#1dcd59";
        }
        else{
            message.textContent = "Password don't match";
            message.style.backgroundColor = "#ff4d4d";
            message.preve
        }
    }
    else{
        alert("Password can't be empty!");
        message.textContent = "";
    }
}

/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

