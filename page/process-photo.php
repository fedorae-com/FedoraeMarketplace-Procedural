<?php
  $conn = mysqli_connect('localhost', 'root', '', 'multi-vendor');

  $msg = "";
  $css_class = "";

  if(isset($_POST['save-photo'])) {
    $profileImageName = time(). '_' . $_FILES['profileImage']['name'];
    $target = 'images/'.$profileImageName;
    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)) {
      // $sql = "INSERT INTO users (profile_image) VALUES ('$profileImageName') WHERE id ='9'";
      $sql = "UPDATE users SET profile_image='$profileImageName' WHERE id=9";
      if(mysqli_query($conn, $sql)){
        $msg = "Image upload";
        $css_class = "uk-info";
      } else {
        $msg = "Failed to upload";
        $css_class = "uk-warning";
    }
  }
}
?>
