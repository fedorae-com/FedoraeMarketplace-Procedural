<?php
  require_once('controllers/authController.php');
  include('components/profile-modal.php');

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
  <title>Multi-Vendor</title>
</head>
<body>

  <div id="app">
    <v-app dark>
      <v-navigation-drawer
        v-model="drawer"
        :mini-variant="miniVariant"
        :clipped="clipped"
        fixed
        app
      >
        <v-list>
          <v-list-item two-line :class="miniVariant && 'px-0'" />
            <v-list-item-avatar style="margin-left:5.5px;">
              <!-- This is an anchor toggling the modal -->
                <?php foreach ($users as $user): ?>
                  <?php if (empty($user['profile_image'])): ?>
                    <a href="#modal-example" uk-toggle><img src="images\userimageplaceholder.png"></a>
                  <?php endif; ?>
                  <?php if (!empty($user['profile_image'])): ?>
                    <a href="#modal-example" uk-toggle><img src="images\<?php echo $user['profile_image']; ?>" alt=""></a>
                  <?php endif; ?>
                <?php endforeach; ?>
            </v-list-item-avatar>

            <v-list-item-content>
              <v-toolbar-title v-text=""><?php echo $_SESSION['username']; ?></v-toolbar-title>
              <v-list-item-subtitle><?php echo $vendor; ?></v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-divider></v-divider>
           <?php foreach ($menu as $key => $value): ?>
             <?php foreach ($value as $option => $to): ?>
               <v-list>
                 <v-list-item class="hovy">
                   <v-hover >
                     <v-list-item-title >
                       <a style="text-decoration: none; color: rgba(0,0,0,.90);" href=<?php echo $to; ?>>
                         <v-list-item-action>
                           <v-icon><?php echo $key; ?></v-icon>
                          </v-list-item-action>
                          <?php echo $option; ?>
                        </a>
                       <v-hover>
                     </v-list-item-title>
                 </v-list-item>
               <v-list>
             <?php endforeach; ?>
           <?php endforeach; ?>
          </v-navigation-drawer>

        <v-app-bar :clipped-left="clipped" fixed app>

          <v-btn @click.stop="miniVariant = !miniVariant" icon>
            <v-icon>mdi-{{ `chevron-${miniVariant ? 'right' : 'left'}` }}</v-icon>
          </v-btn>
          <v-btn @click.stop="clipped = !clipped" icon>
            <v-icon>mdi-application</v-icon>
          </v-btn>
          <v-btn @click.stop="drawer = !drawer" icon>
            <v-icon>mdi-minus</v-icon>
          </v-btn>

        <v-spacer></v-spacer>
        <v-toolbar-title><?php echo $title; ?></v-toolbar-title>
        <v-spacer></v-spacer>

        <!-- username-dropdown-menu -->
        <v-menu offset-y>
          <template v-slot:activator="{ on }">
            <v-btn class="uk-margin-left" style="float: left;" v-on="on" color="primary" dark>
              <v-icon>mdi-account</v-icon>
              <v-icon>mdi-chevron-down</v-icon>
            </v-btn>
          </template>

          <v-list class="hovy">
            <v-list-item>
              <v-list-item-title>
                <a style="text-decoration: none; color: rgba(0,0,0,.90);" href="<?php echo $plink; ?>">
                  <v-list-item-action>
                    <v-icon><?php echo $picon; ?></v-icon>
                  </v-list-item-action>
                  <?php echo $ptext; ?>
                </a>
              </v-list-item-title>
            </v-list-item>
          </v-list>
          <v-divider></v-divider>

          <?php foreach ($dropdown as $key => $value): ?>
            <?php foreach ($value as $option => $to): ?>
              <v-list>
                <v-list-item class="hovy">
                  <v-list-item-title>
                    <a style="text-decoration: none; color: rgba(0,0,0,.90);" href="<?php echo $to; ?>">
                      <v-list-item-action>
                        <v-icon><?php echo $key; ?></v-icon>
                      </v-list-item-action>
                      <?php echo $option; ?>
                    </a>
                  </v-list-item-title>
                </v-list-item>
              </v-list>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </v-menu>
        <!-- -->

        <v-btn @click.stop="rightDrawer = !rightDrawer" icon>
          <a href="<?php echo ROOT_URL ?>dashboard.php?logout=1" class="logout"><v-icon>mdi-logout</v-icon></a>
        </v-btn>
      </v-app-bar>

      <!-- space from top -->
      <div class="uk-margin-large-bottom"></div>
