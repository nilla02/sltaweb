updateList = function() {
    var input = document.getElementById( 'excel' );
    var infoArea = document.getElementById( 'file-upload-filename' );
    infoArea.innerHTML = input.files[0].name;
}

updateList2 = function() {
    var input = document.getElementById( 'depositImage' );
    var infoArea = document.getElementById( 'file-upload-filename' );
    infoArea.innerHTML = input.files[0].name;
}

updateList3 = function() {
    var input = document.getElementById( 'depositImageBack' );
    var infoArea = document.getElementById( 'file-upload-filename2' );
    infoArea.innerHTML = input.files[0].name;
}