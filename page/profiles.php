<?php include('process-photo.php');

  $sql = "SELECT * FROM users";

  $result = mysqli_query($conn, $sql);
  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

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
        <table class="uk-table uk-table-border">
          <thead>
            <th>Profile</th>
          </thead>
          <tbody>
            <?php foreach($users as $user): ?>
              <tr>
                <td><img src="images/<?php echo $user['profile_image']; ?>" alt=""></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
