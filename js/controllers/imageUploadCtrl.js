
$("#upload").click(function(){

    var image = $("[type=file]").val();
    //console.log(image);
});

function readImage(inputField){

    console.log(inputField.files);
    if(inputField.files[0]){
        var reader = new FileReader();

        reader.onload = function(event){
            $("#imagePreview").attr('src',event.target.)
        }
    }

}

$("#imageInput").change(function(){
    //preview image before upload
    readImage(this);
});