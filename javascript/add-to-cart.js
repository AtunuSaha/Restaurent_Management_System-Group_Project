//...CUSTOMER
function isValid(form){
    
    var quantity = form.quantity.value;
    var flag = true;
    
    document.getElementById("quantityError").innerHTML = "";

    if(quantity === "") {

        document.getElementById("quantityError").innerHTML = "<br>Quantity can not be empty";
        flag = false;

    }else {
        for (let i = 0; i < quantity.length; i++) {
            if (!Number.isInteger(parseInt(quantity[i]))) {
                document.getElementById('quantityError').innerHTML = "<br>Quantity can only be numeric";
                return flag = false;
            }
        }
    }

    return flag;

}

