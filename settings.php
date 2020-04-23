<?php require('includes\dashheader.php'); ?>

<?php if($_SESSION['verified']): ?>
 <template>
   <v-card
     class="mx-auto"
     max-width="430"
   >
     <v-card-text>
       <h1 class="display-1 text--primary">
         Coming soon...
       </h1>
     </v-card-text>
   </v-card>
 </template>
<?php endif; ?>

 <?php if(!$_SESSION['verified']): ?>
   <?php include('components\verification-msg.php'); ?>
 <?php endif; ?>

<?php require('includes\dashfooter.php'); ?>
