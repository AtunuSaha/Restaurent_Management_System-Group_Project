//...CUSTOMER
function isValid(form){
    
    let prevPassword = form.prevpassword.value;
    let password = form.password.value;
    let cpassword = form.cpassword.value;
    let flag = true;

    document.getElementById("prevPasswordError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("cpasswordError").innerHTML = "";

    if(!prevPassword) {

        document.getElementById("prevPasswordError").innerHTML = "Please enter your old password<br>";
        flag = false;

    }
    if(!password) {

        document.getElementById("passwordError").innerHTML = "Please enter a new password<br>";
        flag = false;

    }
    if(!cpassword) {

        document.getElementById("cpasswordError").innerHTML = "Please confirm new password<br>";
        flag = false;

    }
    
    return flag;

}