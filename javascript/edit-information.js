//...CUSTOMER
function isValid(form){
    
    let fullname = form.fullname.value;
    let phone = form.phone.value;
    let email = form.email.value;
    let address = form.address.value;
    let username = form.username.value;
    let flag = true;

    document.getElementById("fullnameError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("addressError").innerHTML = "";
    document.getElementById("usernameError").innerHTML = "";

    if(!fullname) {

        document.getElementById("fullnameError").innerHTML = "Please enter your fullname<br>";
        flag = false;

    }
    if(!phone) {

        document.getElementById("phoneError").innerHTML = "Please enter your phone<br>";
        flag = false;

    }
    if(!email) {

        document.getElementById("emailError").innerHTML = "Please enter your email<br>";
        flag = false;

    }
    if(!address) {

        document.getElementById("addressError").innerHTML = "Please enter your address<br>";
        flag = false;

    }
    if(!username) {

        document.getElementById("usernameError").innerHTML = "Please enter your username<br>";
        flag = false;

    }

    return flag;

}