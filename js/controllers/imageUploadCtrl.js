var fileInput = $("[type=file]");
var previewElement = $("#imagePreview");

fileInput.change(function(){
    //check if there is selected fiels in the filelist object
    file = fileInput.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
         dataURL = reader.result;
    }
    reader.readAsDataURL(file);
    console.log(dataURL);
});