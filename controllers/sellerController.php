<?php
  require('config\db.php');
  require('config\variables.php');

  $display_query = "SELECT * FROM users ORDER BY created_at DESC";
  $result = mysqli_query($conn, $display_query);
  $sellers = mysqli_fetch_all($result, MYSQLI_ASSOC);


 ?>
