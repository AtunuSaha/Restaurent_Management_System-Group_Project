//...CUSTOMER
function isValid(form){
    
    var review = form.review.value;
    var flag = true;
    
    document.getElementById("reviewError").innerHTML = "";

    if(review === "") {

        document.getElementById("reviewError").innerHTML = "<br>Review can not be empty<br>";
        flag = false;

    }

    return flag;

}