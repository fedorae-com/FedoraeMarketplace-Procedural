<!-- This is the modal -->
<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
      <a class="uk-alert-close uk-modal-close" uk-close></a>
      <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h2 class="uk-modal-title uk-text-center uk-align-center">Change Photo</h2>
        <div class="uk-container">
          <div class="uk-card uk-card-body uk-text-center uk-align-center">
              <?php if(!empty($msg)): ?>
                <div class="uk-alert <?php echo $css_class; ?>">
                  <?php echo $msg; ?>
                </div>
              <?php endif; ?>
              <div class="uk-form-controls">
                <label for="profileImage">Click below to change profile image.</label>
                <br>
                <?php foreach ($users as $user): ?>
                  <?php if (empty($user['profile_image'])): ?>
                    <img src="page\serveimage.jpg" alt="" onclick="triggerClick()" id="profileDisplay">
                    <input type="file" accept="image/*" name="profileImage" onchange="loadFile(event)" id="uploadImage" class="file_input" style="display: none;" multiple/>
                  <?php endif; ?>
                  <?php if (!empty($user['profile_image'])): ?>
                    <img src="images/<?php echo $user['profile_image']; ?>" alt="" onclick="triggerClick()" id="profileDisplay">
                    <input type="file" accept="image/*" name="profileImage" onchange="loadFile(event)" id="uploadImage" class="file_input" style="display: none;" multiple/>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <script type="text/javascript">
              // profile photo up & preview
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
        </div>
        <p class="uk-text-right">
            <button class="uk-button uk-button-primary" type="submit" name="save-photo" class="uk-button uk-button-default uk-margin-top">Save</button>
        </p>
      </form>
    </div>
</div>
