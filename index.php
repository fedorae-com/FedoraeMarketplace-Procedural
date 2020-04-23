<?php
  require_once('controllers\authController.php');

  // verify the user using token
  if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
  }

  if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
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
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit-icons.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
  <div id="app">
    <!-- nav header -->
    <div>
   <v-app-bar
     color="deep-purple accent-4"
     dense
     dark
   >
     <v-app-bar-nav-icon></v-app-bar-nav-icon>
     <v-toolbar-title>{{ companyName }}</v-toolbar-title>
     <v-spacer></v-spacer>
     <nav class="uk-navbar-container" uk-navbar>
       <div class="uk-inline">
        <button class="uk-button dark" type="button">Categories<span uk-icon="icon: triangle-down"></span></button>
        <div uk-dropdown>
          <ul class="uk-nav uk-dropdown-nav">
              <li class="uk-active"><a href="#">Active</a></li>
              <li><a href="#">Item</a></li>
              <li class="uk-nav-header">Header</li>
              <li><a href="#">Item</a></li>
              <li><a href="#">Item</a></li>
              <li class="uk-nav-divider"></li>
              <li><a href="#">Item</a></li>
          </ul>
       </div>
       <form class="uk-search uk-search-default">
         <span uk-search-icon></span>
         <input class="uk-search-input" type="search" placeholder="Search...">
       </form>
    </nav>
     <v-spacer></v-spacer>
     <v-btn icon>
       <v-icon>mdi-account</v-icon>
       <p>Hello, <a href="<?php echo ROOT_URL; ?>login.php">{{ login }}</a></p>
       <p> / </p>
       <p><a href="<?php echo ROOT_URL; ?>signup.php">{{register}}</a></p>
     </v-btn>
     <v-spacer></v-spacer>
     <v-btn icon>
       <v-icon>mdi-heart</v-icon>
       <p v-for="list in wishlist" :key="amount">Wish list ({{list.amount}})</p>
     </v-btn>
     <div class="uk-margin-right"></div>
     <div class="uk-margin-right"></div>
     <div class="uk-margin-right"></div>
     <v-btn icon>
       <v-icon>mdi-cart</v-icon>
       <p>Cart</p>
     </v-btn>
      <div class="uk-margin-right"></div>
      <div class="uk-margin-right"></div>
      <div class="uk-margin-right"></div>
     <v-menu
       left
       bottom
     >
       <template v-slot:activator="{ on }">
         <v-btn icon v-on="on">
           <v-icon>mdi-check</v-icon>
           <p>Checkout</p>
         </v-btn>
       </template>

       <v-list>
         <v-list-item
           v-for="n in 5"
           :key="n"
           @click="() => {}"
         >
           <v-list-item-title>Option {{ n }}</v-list-item-title>
         </v-list-item>
       </v-list>
     </v-menu>
     <div class="uk-margin-right"></div>
     <div class="uk-margin-right"></div>
   </v-app-bar>
 </div>

   <v-tabs>
    <v-tab><a href="http://localhost/phpsandbox/website4/">Blog</a></v-tab>
    <v-tab>New Arrivals</v-tab>
    <v-tab>Featured Items</v-tab>
    <v-tab>Special Products</v-tab>
    <v-tab>Today's Deals</v-tab>
    <v-tab>Gift Cards</v-tab>
    <v-tab><a href="http://localhost/multi-vendor/sellers/">Browse Sellers</a></v-tab>
    <v-tab>Sell</v-tab>
    <v-spacer></v-spacer>
    <v-tab v-for="list in wishlist" :key="amount">$ {{list.amount}}</v-tab>
    <v-tab v-for="list in wishlist" :key="amount"><v-icon>mdi-cart</v-icon> {{list.amount}}</v-tab>
  </v-tabs>
  <!-- slider -->
  <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 7:2; animation: push">

   <ul class="uk-slideshow-items">
       <li>
           <img src="https://images-na.ssl-images-amazon.com/images/G/01/kindle/merch/2020/TAB/CXL-1772/U_F10_GW-TallHero-Desktop-1500x600_AN._CB426465254_.jpg" alt="" uk-cover>
       </li>
       <li>
           <img src="https://i.alicdn.com/img/tfs/TB1TAdKeuH2gK0jSZFEXXcqMpXa-990-400.jpg" alt="" uk-cover>
       </li>
       <li>
           <img src="https://images-na.ssl-images-amazon.com/images/G/01/img18/home/2019/Q1/gw/space_heaters_gateway_hero_desktop_1x._CB445246273_.jpg" alt="" uk-cover>
       </li>
   </ul>

   <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
   <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
 <!-- -->
</div>

    <v-container fluid>
      <v-row>
        <v-card-title class="headline">
          Top Categories
        </v-card-title>
        <v-col cols="3" sm="1" v-for="product in products" :key="category" >
          <v-img
            :src="product.img"
          ></v-img>
          <p>{{product.category}}</p>
        </v-col>
      </v-row>
    </v-container>

<v-spacer></v-spacer>

<!-- todays deals -->
<v-container>
  <v-card-title class="headline">
    <p>Today's Deals <a href="#"><small>See more</small></a></p>
  </v-card-title>
  <v-row>
    <v-col cols="5" sm="2" v-for="product in products" :key="category" >
      <v-img
        :src="product.img"
        gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"
      ></v-img>
      <p>{{product.price}}</p>
    </v-col>
  </v-row>
</v-container>
<!-- -->

<v-container>
  <v-row>
    <v-col cols="6" sm="3" offset-sm="3">
      <v-card>
        <v-container>
          <v-row>
            <v-col
              v-for="n in 9"
              :key="n"
              class="d-flex child-flex"
              cols="4"
            >
              <v-card flat tile class="d-flex">
                <v-img
                  :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
                  :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
                  aspect-ratio="1"
                  class="grey lighten-2"
                >
                  <template v-slot:placeholder>
                    <v-row
                      class="fill-height ma-0"
                      align="center"
                      justify="center"
                    >
                      <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                    </v-row>
                  </template>
                </v-img>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-col>
    <v-col cols="6" sm="3" offset-sm="1">
      <v-card>
        <v-container>
          <v-row>
            <v-col
              v-for="n in 9"
              :key="n"
              class="d-flex child-flex"
              cols="4"
            >
              <v-card flat tile class="d-flex">
                <v-img
                  :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
                  :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
                  aspect-ratio="1"
                  class="grey lighten-2"
                >
                  <template v-slot:placeholder>
                    <v-row
                      class="fill-height ma-0"
                      align="center"
                      justify="center"
                    >
                      <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                    </v-row>
                  </template>
                </v-img>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-col>

  </v-row>
</v-container>

  <v-footer
    dark
    padless
  >
    <v-card
      class="flex"
      flat
      tile
    >
      <v-card-title class="teal">
        <strong class="subheading">Get connected with us on social networks!</strong>

        <v-spacer></v-spacer>

        <v-btn
          v-for="icon in icons"
          :key="icon"
          class="mx-4"
          dark
          icon
        >
          <v-icon size="24px">{{ icon }}</v-icon>
        </v-btn>
      </v-card-title>

      <v-card-text class="py-2 white--text text-center">
        {{ new Date().getFullYear() }} — <strong>{{ companyName }}</strong>
      </v-card-text>
    </v-card>
  </v-footer>

</div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
</body>
</html>
