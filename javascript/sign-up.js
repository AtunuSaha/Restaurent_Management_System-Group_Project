//...CUSTOMER
function isValid(form){
    
    var fullname = form.fullname.value;
    var phone = form.phone.value;
    var email = form.email.value;
    var address = form.address.value;
    var dob = form.dob.value;
    var username = form.username.value;
    var password = form.password.value;
    var cpassword = form.cpassword.value;
    var flag = true;

    document.getElementById("fullnameError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("addressError").innerHTML = "";
    document.getElementById("dobError").innerHTML = "";
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("cpasswordError").innerHTML = "";

    if(!fullname) {

        document.getElementById("fullnameError").innerHTML = "<br>Please enter your fullname<br>";
        flag = false;

    }
    if(!phone) {

        document.getElementById("phoneError").innerHTML = "<br>Please enter your phone<br>";
        flag = false;

    }
    if(!email) {

        document.getElementById("emailError").innerHTML = "<br>Please enter your email<br>";
        flag = false;

    }
    if(!address) {

        document.getElementById("addressError").innerHTML = "<br>Please enter your address<br>";
        flag = false;

    }
    if(!dob) {

        document.getElementById("dobError").innerHTML = "<br>Please enter your date of birth<br>";
        flag = false;

    }
    if(!username) {

        document.getElementById("usernameError").innerHTML = "<br>Please enter your username<br>";
        flag = false;

    }
    if(!password) {

        document.getElementById("passwordError").innerHTML = "<br>Please enter your password<br>";
        flag = false;

    }
    if(!cpassword) {

        document.getElementById("cpasswordError").innerHTML = "<br>Please re type your password<br>";
        flag = false;

    }

    return flag;


}