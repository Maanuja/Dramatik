import './styles/quizzPlay.css';
import './styles/quizzStart.css';
import './styles/quizzresult.css';



document.querySelectorAll('#nxtqst').forEach(item => {
    item.addEventListener("click", function () {
        var number = item.value;
        var nb = Number(number)+1;
        var tab = document.getElementById("form_question_choice"+number);
        var tabN = document.getElementById("form_question_choice"+nb);
        console.log(tabN);
        //var getSelectedValue = document.querySelector('input[name="questionnumber'+number+'"] :checked ');

        if(document.getElementById('form_question_choice'+number+'_'+0).checked || document.getElementById('form_question_choice'+number+'_'+1).checked ||
            document.getElementById('form_question_choice'+number+'_'+2).checked || document.getElementById('form_question_choice'+number+'_'+3).checked) {
            tab.style.display = "none";
            tabN.style.display = "block";

            var stp = document.querySelector('.moving-steps li:nth-child('+nb+')');
            stp.classList.add("active");

            return true;
        }

        alert("veuillez selectionner une reponse");

    })});




