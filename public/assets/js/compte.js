$(document).ready(function () {
var src = $("#modifier img, #ajout img").attr("src");
if (src != ""){
    $(".nb").css("display","none");
}else{
    $(".nb").css("display","block");
}
$(".nb").css("display","blok");
$("#profile, #add_profile").change(function () {
    var preview = document.querySelector('#modifier img, #ajout img');               
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        preview.src = reader.result;
    };
    if (file) {
        reader.readAsDataURL(file);
        $(".nb").css("display","none");
    } else {
        preview.src = "";
        $(".nb").css("display","blok");
    }
});
}); 