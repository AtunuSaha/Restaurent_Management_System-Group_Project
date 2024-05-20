//...CUSTOMER
function isValid(form){
    
    let myfile = form.myfile.value;
    let flag = true;
    
    document.getElementById("pictureError").innerHTML = "";

    if(!myfile) {

        document.getElementById("pictureError").innerHTML = "<br>Please enter item picture<br>";
        flag = false;

    }

    return flag;


}