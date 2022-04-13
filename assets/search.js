import './styles/search.css';
// start the Stimulus application
import './bootstrap';



var textarea = document.querySelector('textarea');
var p = document.getElementsByClassName('counter');

textarea.addEventListener('input', function (event) {
    for(var i = 0; i < p.length; i++){
        p[i].innerText= event.target.value.length;    // Change the content
    }
    if ( event.target.value.length > 250) {
        //Enable the TextBox when TextBox has value.
        btnSubmit.disabled = true;
    } else {
        //Disable the TextBox when TextBox is empty.
        btnSubmit.disabled = false;
    }
});
