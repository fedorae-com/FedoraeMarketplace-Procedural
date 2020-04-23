<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit-icons.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
  <div id="app">
    <template>
      <v-app dark>
        <v-navigation-drawer
          v-model="drawer"
          :mini-variant="miniVariant"
          :clipped="clipped"
          fixed
          app
        >
          <v-list>
            <v-list-item
              v-for="(item, i) in items"
              :key="i"
              :to="item.to"
              router
              exact
            >
              <v-list-item-action>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title v-text="item.title" />
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-navigation-drawer>
        <v-app-bar :clipped-left="clipped" fixed app>
          <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
          <v-btn @click.stop="miniVariant = !miniVariant" icon>
            <v-icon>mdi-{{ `chevron-${miniVariant ? 'right' : 'left'}` }}</v-icon>
          </v-btn>
          <v-btn @click.stop="clipped = !clipped" icon>
            <v-icon>mdi-application</v-icon>
          </v-btn>
          <v-btn @click.stop="fixed = !fixed" icon>
            <v-icon>mdi-minus</v-icon>
          </v-btn>
          <v-toolbar-title v-text="title" />
          <v-spacer />
          <!-- username-dropdown-menu -->
          <v-menu offset-y>
            <template v-slot:activator="{ on }">
              <v-btn v-on="on" color="primary" dark>
                <v-icon>mdi-account</v-icon>
                <v-toolbar-title v-text="user" />
                <v-icon>mdi-chevron-down</v-icon>
              </v-btn>
            </template>
            <v-list>
              <v-list-item v-for="(link, index) in links" :key="index" @click="">
                <v-list-item-title>{{ link.title }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
          <!-- -->
          <v-btn @click.stop="rightDrawer = !rightDrawer" icon>
            <v-icon>mdi-menu</v-icon>
          </v-btn>
        </v-app-bar>
        <v-content>
          <v-container>
            <nuxt />
          </v-container>
        </v-content>
        <v-navigation-drawer v-model="rightDrawer" :right="right" temporary fixed>
          <v-list>
            <v-list-item @click.native="right = !right">
              <v-list-item-action>
                <v-icon light>
                  mdi-repeat
                </v-icon>
              </v-list-item-action>
              <v-list-item-title>Switch drawer (click me)</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-navigation-drawer>
        <v-footer :fixed="fixed" app>
          <span>&copy; 2020 CMS</span>
        </v-footer>
      </v-app>
    </template>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data() {
        return {
          clipped: true,
          drawer: true,
          fixed: false,
          items: [
            {
              icon: 'mdi-view-dashboard',
              title: 'Dashboard',
              to: '/'
            },
            {
              icon: 'mdi-chart-bubble',
              title: 'Products',
              to: '/products'
            },
            {
              icon: ' mdi-airplane',
              title: 'Logistics',
              to: '/logistics'
            },
            {
              icon: 'mdi-cloud-sync',
              title: 'Backup',
              to: '/backup'
            },
            {
              icon: 'mdi-settings',
              title: 'Settings',
              to: '/settings'
            }
          ],
          miniVariant: false,
          right: true,
          rightDrawer: false,
          title: 'CMS',
          user: 'Jane Doe',
          links: [
            {
              icon: 'mdi-view-dashboard',
              title: 'Account',
              to: '/account'
            },
            {
              icon: 'mdi-settings',
              title: 'Settings',
              to: '/settings'
            },
            {
              icon: 'mdi-view-dashboard',
              title: 'Logout',
              to: '/logout'
            }
          ]
        }
      }
    })
  </script>
</body>
</html>
