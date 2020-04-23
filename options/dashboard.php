<?php
  require_once('controllers/authController.php');
  if (!isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css\styles.css">
  <title>Dashboard</title>
</head>
<body>
  <div id="app">
    <v-app>
      <v-content>
        <template>
          <v-card
            color="grey lighten-4"
            flat
            tile
          >
            <v-toolbar dense>
              <v-app-bar-nav-icon></v-app-bar-nav-icon>

              <v-toolbar-title>Title</v-toolbar-title>

              <v-spacer></v-spacer>

              <v-btn icon>
                <v-icon>mdi-account</v-icon>
              </v-btn>

              <v-btn icon>
                <v-icon>mdi-heart</v-icon>
              </v-btn>

              <v-btn icon>
                <v-icon>mdi-dots-vertical</v-icon>
              </v-btn>
            </v-toolbar>
          </v-card>
        </template>
        <v-container>
          <div class="container">
            <div class="row">
              <div class="col-md-4 offset-md-4 form-div login">
              <?php if(isset($_SESSION['message'])): ?>
                <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                    <?php
                      echo $_SESSION['message'];
                      unset($_SESSION['message']);
                      unset($_SESSION['alert-class']);
                    ?>
                  </div>
              <?php endif; ?>

                <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>


                <a href="index.php?logout=1" class="logout">Logout</a>

                <?php if(!$_SESSION['verified']): ?>
                  <div class="alert alert-warning">
                    You need to verify your account.
                    Sign into your email account and click on the
                    verification link we just emailed you at
                    <strong><?php echo $_SESSION['email']; ?></strong>
                  </div>
                <?php endif; ?>

                <?php if($_SESSION['verified']): ?>
                  <button type="button" name="button" class="btn btn-block btn-lg btn-primary">I am verified!</button>
                <?php endif; ?>
              </div>
            </div>
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
    })
  </script>
</body>
</html>
