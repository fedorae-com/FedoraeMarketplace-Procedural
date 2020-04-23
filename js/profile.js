// photo up & preview
function triggerClick() {
  document.querySelector('#uploadImage').click();
}

window.onload = function() {
  if (window.File && window.FileList && window.FileReader) {
    var filesInput = document.getElementById("uploadImage");
    filesInput.addEventListener("change", function(event) {
      var files = event.target.files;
      var output = document.getElementById("profileDisplay");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();

        picReader.onload = function(event){
          document.querySelector('#profileDisplay').setAttribute('src', event.target.result);
        }
        picReader.readAsDataURL(file);
      }

    });
  }
}
