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

        var stp = document.querySelector('.moving-steps li:nth-child('+nb+')');
        stp.classList.add("active");

        return true;
    })});



