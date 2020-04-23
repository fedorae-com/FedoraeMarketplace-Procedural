<?php

  session_start();

  require('config\db.php');
  require('config\variables.php');
  require_once('emailController.php');


  $errors = array();
  $username = "";
  $email = "";
  $password = "";
  $passwordConf = "";
  $storeName = "";
  $firstName = "";
  $lastName = "";
  $user_id = "";

  if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
  }


  //Your Profile - apart of dropdown menu left
  $ptext = 'Your Profile';
  $picon = 'mdi-account-circle';
  $plink = ROOT_URL.'profile.php?userid='.$user_id;


// if user clicks on the sign up button
  if (isset($_POST['signup-btn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordConf = mysqli_real_escape_string($conn, $_POST['passwordConf']);


// validation
  if (empty($username)) {
    $errors['username'] = "Username required";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email address is invalid";
  }
  if (empty($email)) {
      $errors['email'] = "Email required";
  }
  if (empty($password)) {
      $errors['password'] = "Password required";
  }
  if ($password !== $passwordConf) {
      $errors['password'] = "Passwords do not match";
  }

  $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
  $stmt = $conn->prepare($emailQuery);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0) {
    $errors['email'] = "Email already exists";
  }
  if (count($errors) === 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(50));
    $verified = false;

    $add_user = "INSERT INTO users (username, email, verified, token, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($add_user);
    $stmt->bind_param('ssbss', $username, $email, $verified, $token, $password);

    if ($stmt->execute()) {
      //login user
      $user_id = $conn->insert_id;
      $_SESSION['id'] = $user_id;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['verified'] = $verified;

      sendVerificationEmail($email, $username, $token);

      // set flash message
      $_SESSION['message'] = "Welcome back...!";
      $_SESSION['alert-class'] = "alert-success";
      header('location: dashboard.php');
      exit();
    } else {
      $errors['db_error'] = "Database error: faild to register";
    }
  }
}

// if user clicks on the login button
if (isset($_POST['login-btn'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // validation
  if (empty($username)) {
    $errors['username'] = "Username required";
  }
  if (empty($password)) {
      $errors['password'] = "Password required";
  }

  if (count($errors) === 0) {
    $loginsql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
    $stmt = $conn->prepare($loginsql);
    $stmt->bind_param('ss', $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if(is_null($user)){
      $errors['no_user'] = 'User does not exist';
    } else {
      if (password_verify($password, $user['password'])) {
        //login success
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['verified'] = $user['verified'];
        // set flash message
        $_SESSION['message'] = "You are now logged in!";
        $_SESSION['alert-class'] = "alert-success";
        header('location: dashboard.php');
        exit();
      } else {
        $errors['login_fail'] = "Please double check credentials";
      }
    }
  }
}

// logout
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['verified']);
  header('location: login.php');
  exit();
}

// verify user by token
function verifyUser($token){
  global $conn;
  $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0 ){
    $user = mysqli_fetch_assoc($result);
    $update_query = "UPDATE users SET verified=1 WHERE token='$token'";

    if(mysqli_query($conn, $update_query)){
      // log user in
      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['store_name'] = $user['store_name'];
      $_SESSION['first_name'] = $user['first_name'];
      $_SESSION['last_name'] = $user['last_name'];
      $_SESSION['verified'] = 1;
      // set flash message
      $_SESSION['message'] = "Your email address was successfully verified!";
      $_SESSION['alert-class'] = "alert-success";
      header('location: dashboard.php');
      exit();
    }
  } else {
    echo 'User not found';
  }
}

// if user clicks on the forgot password button
if (isset($_POST['forgot-password'])) {
  $email = $_POST['email'];

  $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $dEmail = mysqli_fetch_assoc($result);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email address is invalid";
  }
  if (empty($email)) {
      $errors['email'] = "Email required";
  }
  if(is_null($dEmail)){
    $errors['no_email'] = 'Email does not exist';
  }

  if (count($errors) == 0) {
    // user prepared statements
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $token = $user['token'];
    sendPasswordResetLink($email, $username, $token);
    header('location: password-message.php');
    exist(0);
  }
}

// if user clicked on the reset password button
if (isset($_POST['reset-password-btn'])) {
  $password = $_POST['password'];
  $passwordConf = $_POST['passwordConf'];

  if (empty($password || empty($passwordConf))) {
      $errors['password'] = "Password required";
  }
  if ($password !== $passwordConf) {
      $errors['password'] = "Passwords do not match";
  }

  $password = password_hash($password, PASSWORD_DEFAULT);
  $email = $_SESSION['email'];

  if (count($errors) == 0) {
    $sql = "UPDATE users SET password='$password' WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header('location: reset-message.php');
      exit(0);
    }
  }
}

// reset password token
function resetPassword($token){
  global $conn;
  $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);
  $_SESSION['email'] = $user['email'];
  header('location: reset-password.php');
  exit(0);
}

// profile update
  if (isset($_SESSION['id'])) {
    $profileId = $_SESSION['id'];
    $profileQuery = "SELECT * FROM users WHERE id=".$profileId;
    $dataresult = mysqli_query($conn, $profileQuery);
    $datausers = mysqli_fetch_all($dataresult, MYSQLI_ASSOC);
  }

 if(isset($_POST['update_profile'])){
   $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $storeName = mysqli_real_escape_string($conn, $_POST['store-name']);
   $firstName = mysqli_real_escape_string($conn, $_POST['first-name']);
   $lastName = mysqli_real_escape_string($conn, $_POST['last-name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);

   // Image upload
   $profileImageName = time(). '_' . $_FILES['image']['name'];
   $target = 'images/'.$profileImageName;

   if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {


   $update_query = "UPDATE users SET
                     username = '$username',
                     store_name = '$storeName',
                     first_name = '$firstName',
                     last_name = '$lastName',
                     email = '$email'
                    WHERE  id =".$user_id;

   if(mysqli_query($conn, $update_query)){
     header('Location: dashboard.php');
   } else {
     echo 'ERROR: '.mysqli_error($conn);
   }
 }
}



// profile image is_uploaded

if(isset($_POST['save-photo'])) {
    $profileImageName = time(). '_' . $_FILES['profileImage']['name'];
    $target = 'images/'.$profileImageName;
    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)) {
      // $sql = "INSERT INTO users (profile_image) VALUES ('$profileImageName') WHERE id ='9'";
      $sql = "UPDATE users SET profile_image='$profileImageName' WHERE id='$user_id'";
      if(mysqli_query($conn, $sql)){
        $msg = "Image upload";
        $css_class = "uk-info";
      } else {
        $msg = "Failed to upload";
        $css_class = "uk-warning";
    }
  }
}

  //getting user profile images
  $sql = "SELECT profile_image FROM users WHERE id='$user_id'";
  $result = mysqli_query($conn, $sql);
  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>
