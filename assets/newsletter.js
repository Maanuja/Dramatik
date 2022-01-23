function newsletter() {
    var x, text;

    email = document.getElementById("inscription_mail").value;

    if (!email.match(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/)) {
       
        document.getElementById("demo").innerHTML= "Fraude !";
        return false;
    } 

    document.getElementById("inscription").submit();
    
}