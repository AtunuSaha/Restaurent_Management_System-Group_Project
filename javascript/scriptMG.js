function validateLogin(form){
    
    let email = form.email.value;
    let password = form.password.value;
    let flag = true;
    
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    if(!email) {

        document.getElementById("emailError").innerHTML = "Please enter your email<br>";
        flag = false;

    }
    if(!password) {

        document.getElementById("passwordError").innerHTML = "Please enter your password<br>";
        flag = false;

    }

    return flag;


}
function validateSignUp(form){
    
    let fullname = form.fullname.value;
    let phone = form.phone.value;
    let email = form.email.value;
    let address = form.address.value;
    let dob = form.dob.value;
    let username = form.username.value;
    let password = form.password.value;
    let cpassword = form.cpassword.value;
    let flag = true;

    document.getElementById("fullnameError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("addressError").innerHTML = "";
    document.getElementById("dobError").innerHTML = "";
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("cpasswordError").innerHTML = "";

    if(!fullname) {

        document.getElementById("fullnameError").innerHTML = "Please enter your fullname<br>";
        flag = false;

    }
    else {
        let nameLen = fullname.split(' ');

            if (nameLen.length < 2) {
                document.getElementById('fullnameError').innerHTML = "Fullname can not be less than 2 words<br>";
                flag = false;
            }
    }
    if(!phone) {

        document.getElementById("phoneError").innerHTML = "Please enter your phone<br>";
        flag = false;

    }
    else {
        for (let i = 0; i < phone.length; i++) {
            if (!Number.isInteger(parseInt(phone[i]))) {
                document.getElementById('phoneError').innerHTML = "Phone number can only contain numbers<br>";
                flag = false;
            }
        }
    }
    if(!email) {

        document.getElementById("emailError").innerHTML = "Please enter your email<br>";
        flag = false;

    }
    else{

        let atPos = email.indexOf('@');
        let dotPos = email.lastIndexOf('.');
        if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === mail.length - 1) {
            document.getElementById('emailError').innerHTML = "Invalid email address<br>";
        }

    }
    if(!address) {

        document.getElementById("addressError").innerHTML = "Please enter your address<br>";
        flag = false;

    }
    if(!dob) {

        document.getElementById("dobError").innerHTML = "Please enter your date of birth<br>";
        flag = false;

    }
    if(!username) {

        document.getElementById("usernameError").innerHTML = "Please enter your username<br>";
        flag = false;

    }
    if(!password) {

        document.getElementById("passwordError").innerHTML = "Please enter your password<br>";
        flag = false;

    }
    else{
        if (password.length < 8){
            document.getElementById("passwordError").innerHTML = "Password must be at least 8 characters long<br>";
            flag = false;
        }
    }
    if(!cpassword) {

        document.getElementById("cpasswordError").innerHTML = "Please re type your password<br>";
        flag = false;

    }
    else{

        if (password !== cpassword) {
            document.getElementById('cpasswordError').innerHTML = "Passwords do not match<br>";
            flag = false;
        }

    }

    return flag;


}

function validateStock(form){
    
    var stock = form.stock.value;
    var flag = true;
    
    document.getElementById("stockError").innerHTML = "";

    if(stock === "") {

        document.getElementById("stockError").innerHTML = "<br>Stock can not be empty<br>";
        flag = false;

    }else {
        for (let i = 0; i < stock.length; i++) {
            if (!Number.isInteger(parseInt(stock[i]))) {
                document.getElementById('stockError').innerHTML = "<br>Stock can only be numeric<br>";
                return flag = false;
            }
        }
    }

    return flag;

}