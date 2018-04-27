


function previewFile() {
    var preview = document.querySelector('#previewImg');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

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

function upload() {

    imageUploadMsgFlag = false;
       var blobFile = document.querySelector('input[type=file]').files[0];

    console.log("sdfasds"+blobFile);
    var formData = new FormData();
    formData.append("image", blobFile);

    $.ajax({
        url: "includes/dbHandler/uploadImageHandler.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // .. do something
           
            if (response) {
                $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                    $("#success-alert").slideUp(500);
                });
            } else {
                $("#danger-alert").fadeTo(1000, 500).slideUp(500, function () {
                    $("#danger-alert").slideUp(500);
                });
            }
        },
        error: function (jqXHR, textStatus, errorMessage) {
            console.log(errorMessage); // Optional
            console.log("failed");
        }
    });
}