// // product photo up & preview
function imageClick() {
  document.querySelector('#productImage').click();
}


window.onload = function() {
  if (window.File && window.FileList && window.FileReader) {
    var filesInput = document.getElementById("productImage");
    filesInput.addEventListener("change", function(event) {
      var files = event.target.files;
      var output = document.getElementById("displayImage");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();

        picReader.onload = function(event){
          document.querySelector('#displayImage').setAttribute('src', event.target.result);
        }
        picReader.readAsDataURL(file);
      }

    });
  }
}
