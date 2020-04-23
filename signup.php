<?php require_once('controllers\authController.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/css/uikit.min.css" />
  <!-- UIkit JS -->
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit-icons.min.js"></script>
</head>
<body>

  <!-- navy -->
    <nav class="uk-navbar uk-navbar-container">
      <div class="uk-navbar-left">
          <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#"></a>
      </div>
    </nav>
  <!-- -->

  <div id="app">
    <v-app>
      <v-content>
        <v-container>

          <div id="app">
            <v-app>
            <v-card width="400" class="mx-auto mt-5">
              <v-card-title>
                <h1 class="display-1 uk-align-center">Sign Up</h1>
              </v-card-title>
              <v-card-text>
              <v-divider></v-divider>

                <?php if(count($errors) > 0): ?>
                    <v-alert type="warning">
                      <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                      <?php endforeach; ?>
                    </v-alert>
                <?php endif; ?>

                <v-form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="form-group">
                    <v-text-field type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg"
                      name="name"
                      label="Username"
                      prepend-icon="mdi-account-circle"
                      required>
                  </div>
                  <div class="form-group">
                    <v-text-field type="text" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg"
                      name="email"
                      label="Email"
                      prepend-icon="mdi-email"
                      required>
                  </div>

                  <div class="form-group">
                    <v-text-field type="password" name="password" value="<?php echo $password; ?>" class="form-control form-control-lg"

                      :type="showPassword ? 'text' : 'password'"
                      :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                      @click:append="showPassword = !showPassword"
                      label="Password"
                      prepend-icon="mdi-lock"

                       required>
                  </div>

                  <div class="form-group">
                    <v-text-field type="password" name="passwordConf" value="<?php echo $password; ?>" class="form-control form-control-lg"

                      :type="showPassword ? 'text' : 'password'"
                      :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                      @click:append="showPassword = !showPassword"
                      label="Confirm Password"
                      prepend-icon="mdi-shield-check"

                       required>
                  </div>
                  <v-divider></v-divider>
                  <div class="my-2 text-center">
                    <v-btn x-large type="submit" name="signup-btn" color="info" dark>Sign Up</v-btn>
                  </div>
                  <p class="text-center">Already have an account? <a style="text-decoration: none;" href="<?php ROOT_URL; ?>login.php">Sign In</a></p>
                </v-form>
              </v-card-text>
            </v-card>
          </v-app>
          </div>
        </v-container>
      </v-content>
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
