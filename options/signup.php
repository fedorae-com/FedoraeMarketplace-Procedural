<?php require_once('controllers\authController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/css/uikit.min.css" />
  <!-- UIkit JS -->
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit-icons.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css\styles.css">
  <title>Sign Up / Register</title>
</head>
<body>

  <!-- navy -->
    <nav class="uk-navbar uk-navbar-container">
      <div class="uk-navbar-left">
          <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#"></a>
      </div>
    </nav>
  <!-- -->

  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <h3 class="text-center">Register</h3>

          <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
              <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter Username" class="form-control form-control-lg" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter Email" class="form-control form-control-lg" required>
          </div>

          <div class="form-group">
            <label for="username">Password</label>
            <input type="password" name="password" value="" placeholder="Enter Password" class="form-control form-control-lg" required>
          </div>

          <div class="form-group">
            <label for="username">Confirm Password</label>
            <input type="password" name="passwordConf" value="" placeholder="Enter Username" class="form-control form-control-lg" required>
          </div>

          <div class="form-group">
            <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Sign Up</button>
          </div>
          <p class="text-center">Already have an account? <a href="<?php ROOT_URL; ?>login.php">Sign In</a></p>
        </form>
      </div>
    </div>

  </div>

</body>
</html>
