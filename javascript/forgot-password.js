//...CUSTOMER
function isValid(form){
    
    let email = form.email.value;
    let flag = true;

    document.getElementById("emailError").innerHTML = "";

    if(!email) {

        document.getElementById("emailError").innerHTML = "Please enter your email<br>";
        flag = false;

    }

    return flag;


}