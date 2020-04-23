<?php
  require_once('controllers/authController.php');

  if (!isset($_SESSION['token'])) {
    header('location: forgot-password.php');
  }
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
  <title>Reset Password</title>
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
        <h1 class="display-1">Reset Password</h1>
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
            <v-text-field type="password" name="password" value="" class="form-control form-control-lg"

              :type="showPassword ? 'text' : 'password'"
              :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
              @click:append="showPassword = !showPassword"
              label="Password"
              prepend-icon="mdi-lock"

               required>
          </div>

          <div class="form-group">
            <v-text-field type="password" name="passwordConf" value="" class="form-control form-control-lg"

              :type="showPassword ? 'text' : 'password'"
              :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
              @click:append="showPassword = !showPassword"
              label="Confirm Password"
              prepend-icon="mdi-shield-check"

               required>
          </div>
          <v-divider></v-divider>
          <v-card-actions>
            <div class="uk-align-center">
              <v-btn type="submit" color="success" name="reset-password-btn" class="uk-align-center">Recover Password</v-btn>
            </div>
          </v-card-actions>
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
