


function previewFile() {
    var preview = document.querySelector('#previewImg');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        console.log(file);
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

var imageUploadMsg = "yazan";
var imageUploadMsgFlag = false;
var alertEl = $(".imageUploadMsg");

function upload(){

    imageUploadMsgFlag = false;
    console.log(imageUploadMsgFlag);
    var blobFile = document.querySelector('input[type=file]').files[0];

    console.log(blobFile);
    var formData = new FormData();
    formData.append("image", blobFile);

    $.ajax({
        url: "includes/dbHandler/uploadImageHandler.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // .. do something
            console .log(response);
            imageUploadMsgFlag = true;
            console.log(imageUploadMsgFlag);
            if(imageUploadMsgFlag){
                console.log(alertEl);
                alertEl.show();
                alertEl.html(imageUploadMsg);
            }else{
                alertEl.hide();
            }

        },
        error: function(jqXHR, textStatus, errorMessage) {
            console.log(errorMessage); // Optional
        }
    });
}