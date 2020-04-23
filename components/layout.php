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
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit-icons.min.js"></script>
  <link rel="stylesheet" href="css\styles.css">

  <!-- orders -->
  <style>
    .v-sheet--offset {
      top: -24px;
      position: relative;
    }
  </style>
</head>
<body>

<div id="app">
  <template>
    <v-container class="white lighten-5">
      <!-- Stack the columns on mobile by making one full-width and the other half-width -->
      <v-row class="uk-margin-large-left">
        <v-col class="uk-margin-xlarge-left">
            <?php include('sales.php'); ?>
        </v-col>
        <v-col>
          <v-card>
            <?php include('orders.php'); ?>
          </v-card>
        </v-col>
      </v-row>

      <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
      <v-row class="uk-margin-large-left">
        <v-col
         class="uk-margin-xlarge-left"
         cols="10"
         md="7"
         >
            <?php include('userreg.php'); ?>
        </v-col>
        <v-col
          cols="6"
          md="3"
        >
            <?php include('wod.php'); ?>
        </v-col>
      </v-row>

      <!-- Columns are always 50% wide, on mobile and desktop -->
      <v-row class="uk-margin-large-left">
        <v-col
          class="uk-margin-xlarge-left"
          cols="6"
          md="4"
        >
            <?php include('socialmedia.php'); ?>
        </v-col>
        <v-col
          cols="10"
          md="6"
        >
            <?php include('weather.php'); ?>
        </v-col>
      </v-row>
    </v-container>
  </template>
  <?php //include('includes\footer.php'); ?>
</div>


  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <!-- <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data () {
        return {
          value: [
            423,
            446,
            675,
            510,
            590,
            610,
            760,
          ],
          labels: [
            '12am',
            '3am',
            '6am',
            '9am',
            '12pm',
            '3pm',
            '6pm',
            '9pm',
          ],
          orders: [
            100,
            70,
            75,
            51,
            50,
            10,
            1,
          ],
        }
      },
    })
  </script> -->
</body>
</html>
