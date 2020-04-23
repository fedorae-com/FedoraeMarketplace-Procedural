<?php

  require('constants.php');

/*
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if ($conn->connect_error) {
    die('Database error:'.$conn->connect_error);
  }
*/

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if(mysqli_connect_errno()){
    echo 'Failed to connect to mysql '. mysqli_connect_errno();
  }
