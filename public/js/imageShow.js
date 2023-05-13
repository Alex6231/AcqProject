const imageShowField = document.querySelector("#imageShowField");
const imageInput = document.querySelector("#imageInput");

imageInput.addEventListener("input", (event)=>{
    const fileFormat = imageInput.value.split(".")[imageInput.value.split(".").length-1]
    if(fileFormat === "jpg" || fileFormat === "jpeg" || fileFormat === "png" ) {
        imageShowField.style = "display: block;";
        const target = event.target;
        // const laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // let form = new FormData()
        // form.append("", "")
        // axios.post('http://127.0.0.1:8000/upload_image_test', form, { headers: `X-CSRF-TOKEN: ${laravelToken}`});

            if (!FileReader) {
                console.log('FileReader не работает, обновите ваш браузер!');
                return;
            }

            const fileReader = new FileReader();
            fileReader.onload = function() {
                imageShowField.src = fileReader.result;
            }

            fileReader.readAsDataURL(target.files[0]);
    } else {
        imageInput.value = ""
        imageShowField.style = "display: none;";
    }
})
