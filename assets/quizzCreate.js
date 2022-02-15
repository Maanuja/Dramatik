/*
 * Welcome to your app's quizz JavaScript file!
 */


// any CSS you import will output into a single css file (app.css in this case)
import './styles/quizzCreate.css';
// start the Stimulus application
import './bootstrap';



const file = document.getElementById("file-cq-1");
const preview = document.getElementById("quizz-preview");


file.addEventListener("change", function () {
    getImage();
        /*const src = URL.createObjectURL(file.files[0]);
        //console.log(src);
        preview.src = src;
        preview.style.display = "block";*/
    }
);

function getImage() {
    const files = file.files[0];
    if(files){
        const reader = new FileReader();

        //Read the contents of Image File.
        reader.readAsDataURL(files);
        reader.addEventListener("load", function () {

            //Initiate the JavaScript Image object.
            const image = new Image();

            //Set the Base64 string return from FileReader as source.
            image.src = reader.result;

            //Validate the File Height and Width.
            image.onload = function () {
                const height = this.height;
                const width = this.width;

                if (height < 1080 || width < 1920) {
                    alert("Height and Width must not under 1080px for height and 1920px for width.");
                    return false;
                }

                preview.src = reader.result;
                preview.style.display = "block";
                return true;
            };

        })
    };
}

function handleNextQuestion(i) {
    const ind = i;
    const next = document.getElementsByName("question"+ind+1);
    next.style.display=block;
    document.getElementsByName("question"+i).style.display=none;

    }

