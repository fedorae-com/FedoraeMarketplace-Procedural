 <?php
require('config\db.php');

if(isset($_POST['uptop'])){
  $username = mysqli_real_escape_string($conn, $_GET['username']);

  // Image upload
  $pic = time(). '_' . $_FILES['pic']['name'];
  $target = 'images/'.$pic;

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {


  $quer = "INSERT INTO products (image) VALUES ('$pic')";

  if(mysqli_query($conn, $quer)){
    echo "It worked";;
  } else {
    echo 'ERROR: '.mysqli_error($conn);
  }
}
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>My rad Website</title>
   </head>
   <body>
    <form class="" action="test.php" method="GET" enctype="multipart/form-data">
     <div class="">
       <label for="">Name</label><br/>
       <img id="blah" alt="your image" width="100" height="100" />

       <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
     </div>
     <input type="submit" name="uptop" value="Submit">
    </form>

   </body>
 </html>
