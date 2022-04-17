
import './styles/quizzCreate.css';
import './bootstrap';



const file = document.getElementById("file-cq-1");
const preview = document.getElementById("quizz-preview");


file.addEventListener("change", function () {
    getImage();
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
                    alert("Height and Width must not be under 1080px for height and 1920px for width.");
                    return false;
                }

                preview.src = reader.result;
                preview.style.display = "block";
                return true;
            };

        })
    };
}


