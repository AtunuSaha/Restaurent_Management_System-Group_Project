//...CUSTOMER
function isValid(form){
    
    var email = form.email.value;
    var password = form.password.value;
    var flag = true;
    
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    if(email === "") {

        document.getElementById("emailError").innerHTML = "<br>Please enter your email<br>";
        flag = false;

    }
    if(password === "") {

        document.getElementById("passwordError").innerHTML = "Please enter your password<br>";
        flag = false;

    }

    return flag;

}