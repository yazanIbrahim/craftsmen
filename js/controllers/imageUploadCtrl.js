var fileInput = $("[type=file]");
var previewElement = $("#imagePreview");

fileInput.change(function(){
    console.log("yazan");

    //check if there is selected fiels in the filelist object
     selectedFiles = fileInput.files;
    console.log(selectedFiles[0]);


        var image = selectedFiles[0];
        console.log("image = "+image.name);


});