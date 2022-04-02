function newsletter() {
    var x, text;

    email = document.getElementById("inscription_mail").value;

    if (!email.match(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/)) {
       
        document.getElementById("demo").innerHTML= "Fraude !";
        return false;
    } 

    document.getElementById("inscription").submit();
    
}

function contact() {
    var x, text;

    phone = document.getElementById("phone").value;

    if (!phone.match(/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/)) {

        document.getElementById("err").innerHTML= "Le numero est incorrect!";
        return false;
    }

    document.getElementById("contact").submit();

}