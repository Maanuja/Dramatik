import './styles/quizzPlay.css';
import './bootstrap';


document.querySelectorAll('#nxtqst').forEach(item => {
    item.addEventListener("click", function () {
        var number = item.value;
        var nb = Number(number)+1;
        var tab = document.getElementById("question"+number);
        var tabN = document.getElementById("question"+nb);

        tab.style.display = "none";
        tabN.style.display = "block";
        //alert(number +"H eight and Width must not be under 1080px for height and 1920px for width.");
        return true;
    })});



