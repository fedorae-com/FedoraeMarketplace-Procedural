    <v-navigation-drawer v-model="rightDrawer" :right="right" temporary fixed>
      <v-list>
        <v-list-item @click.native="right = !right">
          <v-list-item-action>
            <v-icon light>
              mdi-repeat
            </v-icon>
          </v-list-item-action>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-footer :fixed="fixed" app>
      <v-spacer></v-spacer>
      <span>
        Copyright &copy; CMS 2020. Version 1.0.0.1
      </span>
    </v-footer>
  </v-app>
</div>

<script type="text/javascript" src="js\main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
  new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    clipped: true,
    drawer: true,
    fixed: true,
    miniVariant: false,
    right: true,
    rightDrawer: false,
    fav: true,
    menu: false,
    message: false,
    hints: true,
    data () {
      return {
        drawer: true,
        right: true,
        miniVariant: false,
        expandOnHover: false,
        background: false,
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
</script>
</body>
</html>
