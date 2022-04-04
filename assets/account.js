import './styles/account.css';
import './styles/input.css';
import './styles/myQuizz.css';
// start the Stimulus application
import './bootstrap';


window.addEventListener('load', (event) => {
    var succesCreate =document.getElementById('modified');
    var successAlert = new bootstrap.Toast(succesCreate);
    successAlert.show();
});