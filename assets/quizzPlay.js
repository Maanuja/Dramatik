require('./styles/quizzPlay.css');

const btn = document.getElementById("nxtqst").addEventListener("click", displayNext(document.getElementById("nextqst").value));


function displayNext(number) {
    var tab = document.getElementById("question"+number);
    var tabN = document.getElementById("question"+number+1);
    tab.style.display=" none !important";
    if (tab.style.display !== " none !important") {
        tab.style.display = " none !important";
    } else {
        tab.style.display = "flex !important";
    }
    tabN.style.display="flex !important";
    //alert(number +"H eight and Width must not be under 1080px for height and 1920px for width.");
    return true;
    }
