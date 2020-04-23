<?php
  require_once('controllers/authController.php');
?>

<!DOCTYPE html>
<html>
<head>
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/css/uikit.min.css" />
  <!-- UIkit JS -->
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit-icons.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <title>Password Reset</title>
</head>
<body>

  <!-- navy -->
    <nav class="uk-navbar uk-navbar-container">
      <div class="uk-navbar-left">
          <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#"></a>
      </div>
    </nav>
  <!-- -->
  <div class="uk-margin-bottom">
    <br>
    <br>
  </div>

  <div class="uk-container uk-align-center">
    <div class="uk-card uk-card-body uk-card-default uk-card-hover" style="background-color: lightgrey;">
      <div class="uk-heading">
        <h1 class="uk-heading-line uk-text-center">Recover Password</h1>
      </div>
      <div class="uk-text-center">
        <p class="uk-text-small">
          An email has been sent to your email address <br /> with a link to reset your password. <br /> If you do not see this email check your spam folder.
        </p>
      </div>
    </div>
  </div>

</body>
</html>
