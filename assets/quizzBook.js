import './styles/quizzBook.css';


window.bootstrap = require("bootstrap")
window.addEventListener('load', (event) => {
    var succesCreate =document.getElementById('created');
    var successAlert = new bootstrap.Toast(succesCreate);
    successAlert.show();
});

