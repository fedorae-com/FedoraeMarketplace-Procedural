<?php
  require('authController.php');
  require('config/variables.php');

  $sess_id = $_SESSION['id'];


  # upload a product

  if(isset($_POST['save'])){

    //$user_id = mysqli_real_escape_string($conn, $_POST['id']);

    $productName = mysqli_real_escape_string($conn, $_POST['product-name']);
    $description = mysqli_real_escape_string($conn, $_POST['product-description']);
    $metaTagTitle = mysqli_real_escape_string($conn, $_POST['meta-tag-title']);
    $metaTagDescription = mysqli_real_escape_string($conn, $_POST['meta-tag-description']);
    $metaTagKeywords = mysqli_real_escape_string($conn, $_POST['meta-tag-keywords']);
    $sku = mysqli_real_escape_string($conn, $_POST['sku']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $outOfStatus = mysqli_real_escape_string($conn, $_POST['out-of-status']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $seo = mysqli_real_escape_string($conn, $_POST['seo']);

    if(isset($_POST['save'])){
      // Image upload
      $productImageName = time(). '_' . $_FILES['productImage']['name'];
      $target = 'images/'.$productImageName;
      if (move_uploaded_file($_FILES['productImage']['tmp_name'], $target)) {
      $quer = "INSERT INTO products (name, description, meta_tag_title, meta_tag_description, meta_tag_keywords, sku, price, quantity, out_of_status, weight, status, image, seo, seller_id) VALUES ('$productName', '$description', '$metaTagTitle', '$metaTagDescription', '$metaTagKeywords', '$sku', '$price', '$quantity', '$outOfStatus', '$weight', '$status', '$productImageName', '$seo', '$sess_id')";

      if(mysqli_query($conn, $quer)){
        header('Location: products.php');
      } else {
        echo 'ERROR: '.mysqli_error($conn);
      }
    }
  }
}

if (empty($_GET['id'])) {
  #display products

  $display_query = "SELECT * FROM products WHERE seller_id='$sess_id' ORDER BY created_at DESC";
  $result = mysqli_query($conn, $display_query);
  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
  # getting products

  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $query = 'SELECT * FROM products WHERE id = '.$id;
  $result = mysqli_query($conn, $query);
  $product = mysqli_fetch_assoc($result);
}


# edit product

 if(isset($_POST['submit'])){
   $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);

   $productName = mysqli_real_escape_string($conn, $_POST['product-name']);
   $description = mysqli_real_escape_string($conn, $_POST['product-description']);
   $metaTagTitle = mysqli_real_escape_string($conn, $_POST['meta-tag-title']);
   $metaTagDescription = mysqli_real_escape_string($conn, $_POST['meta-tag-description']);
   $metaTagKeywords = mysqli_real_escape_string($conn, $_POST['meta-tag-keywords']);
   $sku = mysqli_real_escape_string($conn, $_POST['sku']);
   $price = mysqli_real_escape_string($conn, $_POST['price']);
   $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
   $outOfStatus = mysqli_real_escape_string($conn, $_POST['out-of-status']);
   $weight = mysqli_real_escape_string($conn, $_POST['weight']);
   $status = mysqli_real_escape_string($conn, $_POST['status']);
   $seo = mysqli_real_escape_string($conn, $_POST['seo']);

   $update_query = "UPDATE products SET
                     name = '$productName',
                     description = '$description',
                     meta_tag_title = '$metaTagTitle',
                     meta_tag_description = '$metaTagDescription',
                     meta_tag_keywords = '$metaTagKeywords',
                     sku = '$sku',
                     out_of_status = '$outOfStatus',
                     weight = '$weight',
                     status = '$status',
                     seo = '$seo'
                    WHERE  id = {$update_id}";

   if(mysqli_query($conn, $update_query)){
     header('Location: products.php');
   } else {
     echo 'ERROR: '.mysqli_error($conn);
   }
 }

 # delete product

if (isset($_POST['delete'])) {
  $chkid = $_POST['chkbox'];

  foreach ($chkid as $id) {
    $delete_query = "DELETE FROM products WHERE id=".$id;
    mysqli_query($conn, $delete_query);
  }
  if (mysqli_query($conn, $delete_query)) {
      header('location: products.php');
  } else {
    echo 'ERROR: '.mysqli_error($conn);
  }
}



?>
