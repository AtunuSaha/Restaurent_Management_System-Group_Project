//...CUSTOMER
function isValid(form){
    
    var complaint = form.complaint.value;
    var flag = true;
    
    document.getElementById("complaintError").innerHTML = "";

    if(complaint === "") {

        document.getElementById("complaintError").innerHTML = "<br>Complaint can not be empty<br>";
        flag = false;

    }

    return flag;

}