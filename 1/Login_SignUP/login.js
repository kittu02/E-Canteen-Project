
var EmailField = document.getElementById("email-feild");
var EmailLabel = document.getElementById("email-label");
var EmailError = document.getElementById("email-error");


const validateEmail = () => {

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


