updateList = function() {
var input = document.getElementById( 'vat' );
var infoArea = document.getElementById( 'file-upload-filename' );
infoArea.innerHTML = input.files[0].name;
}
updateList2 = function() {
    var inputtwo = document.getElementById( 'coicogs' );
    var infoAreatwo = document.getElementById( 'file-upload-filename-2' );
    infoAreatwo.innerHTML = inputtwo.files[0].name;
}
updateList3 = function() {
    var input3 = document.getElementById( 'business' );
    var infoArea3 = document.getElementById( 'file-upload-filename-3' );
    infoArea3.innerHTML = input3.files[0].name;
}
updateList4 = function() {
    var input4 = document.getElementById( 'government_id' );
    var infoArea4 = document.getElementById( 'file-upload-filename-4' );
    infoArea4.innerHTML = input4.files[0].name;
}
updateList5 = function() {
    var input5 = document.getElementById( 'signature' );
    var infoArea5 = document.getElementById( 'file-upload-filename-5' );
    infoArea5.innerHTML = input5.files[0].name;
}
