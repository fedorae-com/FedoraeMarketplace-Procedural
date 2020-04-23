<?php include('process-photo.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.2/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.2/dist/js/uikit-icons.min.js"></script>

    <title>Upload Photo</title>
  </head>
  <body>
    <div class="uk-container">
      <div class="uk-card uk-card-body">
        <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
          <h3>Create Profile</h3>
          <?php if(!empty($msg)): ?>
            <div class="uk-alert <?php echo $css_class; ?>">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="uk-form-controls">
            <label for="profileImage">P-I</label>
            <br>
            <?php if (empty($user['profile_image'])): ?>
              <img src="page\serveimage.jpg" alt="" onclick="triggerClick()" id="profileDisplay">
              <input type="file" accept="image/*" name="profileImage" onchange="loadFile(event)" id="uploadImage" class="file_input" style="display: none;" multiple/>
            <?php endif; ?>
            <?php if (!empty($user['profile_image'])): ?>
              <img src="images/<?php echo $user['profile_image']; ?>" alt="" onclick="triggerClick()" id="profileDisplay">
              <input type="file" accept="image/*" name="profileImage" onchange="loadFile(event)" id="uploadImage" class="file_input" style="display: none;" multiple/>
            <?php endif; ?>

            <script type="text/javascript">

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
            </script>

          </div>

          <div class="uk-form-controls uk-margin-top">
            <button type="submit" name="save-photo" class="uk-button uk-button-default uk-margin-top">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
