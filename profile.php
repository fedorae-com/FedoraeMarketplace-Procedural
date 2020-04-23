<?php
  require('controllers\authController.php');
  require('includes\dashheader.php');
 ?>

<?php if($_SESSION['verified']): ?>

 <div class="uk-container uk-margin-xlarge-left uk-margin-remove-right uk-margin-bottom">
   <form class="uk-form-horizontal uk-margin-xlarge-left" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

     <div  class="uk-container">
       <v-row  class="uk-margin-xlarge-left uk-align-right" align="right" justify="left">
         <input type="hidden" name="update_profile" value="<?php echo $_SESSION['id']; ?>">
         <v-btn type="submit" name="update_profile" class="" uk-tooltip="Save"><v-icon color="blue">mdi-content-save</v-icon></v-btn>
         <v-btn><a href="dashboard.php"><v-icon color="black" uk-tooltip="Cancel">mdi-reply</v-icon></a></v-btn>
       </v-row>
     </div>

 <ul>
     <li class="uk-list">
         <h1>Profile</h1>
         <?php foreach ($datausers as $datauser): ?>
               <div class="uk-margin">
                   <label class="uk-form-label" for="form-horizontal-text">Username</label>
                   <div class="uk-form-controls">
                       <input class="uk-input" id="form-horizontal-text" type="text" name="username" value="<?php echo $datauser['username']; ?>">
                   </div>
               </div>
               <div class="uk-margin">
                   <label class="uk-form-label" for="form-horizontal-text">Store Name</label>
                   <div class="uk-form-controls">
                       <input class="uk-input" id="form-horizontal-text" type="text" name="store-name" value="<?php echo $datauser['store_name']; ?>">
                   </div>
               </div>
               <div class="uk-margin">
                   <label class="uk-form-label" for="form-horizontal-text">First Name</label>
                   <div class="uk-form-controls">
                       <input class="uk-input" id="form-horizontal-text" type="text" name="first-name" value="<?php echo $datauser['first_name']; ?>">
                   </div>
               </div>
               <div class="uk-margin">
                   <label class="uk-form-label" for="form-horizontal-text">Last Name</label>
                   <div class="uk-form-controls">
                       <input class="uk-input" id="form-horizontal-text" type="text" name="last-name" value="<?php echo $datauser['last_name']; ?>">
                   </div>
               </div>
               <div class="uk-margin">
                   <label class="uk-form-label" for="form-horizontal-text">E-mail</label>
                   <div class="uk-form-controls">
                       <input class="uk-input" id="form-horizontal-text" type="text" name="email" value="<?php echo $datauser['email']; ?>">
                   </div>
               </div>
                <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Image</label>
                  <v-row class="uk-form-controls">
                    <v-col cols="5" sm="3">
                      <?php foreach ($users as $user): ?>
                        <?php if (empty($user['profile_image'])): ?>
                          <a href="#modal-example" uk-toggle><v-img src="images\userimageplaceholder.png"></a>
                        <?php endif; ?>
                        <?php if (!empty($user['profile_image'])): ?>
                          <a href="#modal-example" uk-toggle><v-img src="images/<?php echo $user['profile_image']; ?>" alt=""></a>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </v-col>
                </div>
               <?php endforeach; ?>
               <div class="uk-margin">
                   <label class="uk-form-label" for="form-horizontal-text">Forgot Password</label>
                   <div class="uk-form-controls">
                       <a class="uk-button uk-button-secondary" href="<?php echo ROOT_URL.'forgot-password.php'; ?>">Reset</a>
                   </div>
               </div>
         </div>
       </li>
     </ul>
   </form>
 </div>

 <!-- This is the modal -->
 <div id="modal-example" uk-modal>
     <div class="uk-modal-dialog uk-modal-body">
       <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
         <h2 class="uk-modal-title">Change Photo</h2>
         <div class="uk-container">
           <div class="uk-card uk-card-body">
               <?php if(!empty($msg)): ?>
                 <div class="uk-alert <?php echo $css_class; ?>">
                   <?php echo $msg; ?>
                 </div>
               <?php endif; ?>
               <div class="uk-form-controls">
                 <label for="profileImage">Click below to change profile image.</label>
                 <br>
                 <?php if (empty($user['profile_image'])): ?>
                   <img src="images\userimageplaceholder.png" alt="" onclick="triggerClick()" id="profileDisplay">
                   <input type="file" accept="image/*" name="profileImage" onchange="loadFile(event)" id="uploadImage" class="file_input" style="display: none;" multiple/>
                 <?php endif; ?>
                 <?php if (!empty($user['profile_image'])): ?>
                   <img src="images/<?php echo $user['profile_image']; ?>" alt="" onclick="triggerClick()" id="profileDisplay">
                   <input type="file" accept="image/*" name="profileImage" onchange="loadFile(event)" id="uploadImage" class="file_input" style="display: none;" multiple/>
                 <?php endif; ?>
               </div>
           </div>
         </div>
         <p class="uk-text-right">
             <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
             <button class="uk-button uk-button-primary" type="submit" name="save-photo" class="uk-button uk-button-default uk-margin-top">Save</button>
         </p>
       </form>
     </div>
 </div>

<?php endif; ?>

<?php if(!$_SESSION['verified']): ?>
  <?php include('components\verification-msg.php'); ?>
<?php endif; ?>


 <?php require('includes\dashfooter.php'); ?>
