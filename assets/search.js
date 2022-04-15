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


var textareaCritik = document.querySelector('textarea');
var p2 = document.getElementsByClassName('counterCritik');

textareaCritik.addEventListener('input', function (event) {
    for(var i = 0; i < p2.length; i++){
        p2[i].innerText= event.target.value.length;    // Change the content
    }
    if ( event.target.value.length < 500) {
        //Enable the TextBox when TextBox has value.
        btnSubmit2.disabled = true;
    } else {
        //Disable the TextBox when TextBox is empty.
        btnSubmit2.disabled = false;
    }
});