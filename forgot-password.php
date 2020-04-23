<?php
  require('controllers/authController.php');
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/css/uikit.min.css" />
  <!-- UIkit JS -->
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit-icons.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <title>Forgot Password</title>
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

  <div id="app">
    <v-app>
    <v-card width="400" class="mx-auto mt-5">
      <v-card-title>
        <h1 class="display-1 uk-align-center">Recover Password</h1>
        <p class="uk-text-small">Please enter the email address you used to sign up and we will assist in recovering your password.</p>
      </v-card-title>
      <v-card-text>

        <?php if(count($errors) > 0): ?>
            <v-alert type="warning">
              <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </v-alert>
        <?php endif; ?>

        <v-form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <v-text-field type="text" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg"
              name="email"
              label="Email"
              prepend-icon="mdi-account-circle"
              required>
          </div>
          <v-divider></v-divider>
          <v-btn type="submit" color="info" name="forgot-password" class="uk-align-center">Recover Password</v-btn>
          <a href="<?php echo ROOT_URL.'login.php' ?>">Cancel</a>
        </v-form>

      </v-card-text>
    </v-card>
  </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data(){
        return{
          showPassword: false
        }
      }
    })
  </script>
</body>
</html>
