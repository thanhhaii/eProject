function changePicture() {
    var tmpPatch = URL.createObjectURL(event.target.files[0]);
    console.log(tmpPatch);
    $("#viewAvatar").attr('src',tmpPatch);
}