new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data(){
      return{
          welcome: 'Welcome to the new developing landing page. Coming soon!',
          companyName: 'EULA',
          fname: 'Jane',
          lname: 'Doe',
          or: 'or',
          login: 'Sign in',
          register: 'register',
          wishlist : [
            {
              amount : 0
            }
          ],
          cards: [
            { title: 'Favorite road trips', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 3 },
            { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 3 },
            { title: 'Favorite road trips', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 3 },
            { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 3 },
            { title: 'Favorite road trips', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 3 }
          ],
          cards: [
        { title: 'Pre-fab homes', src: 'https://cdn.vuetifyjs.com/images/cards/house.jpg', flex: 12 },
        { title: 'Favorite road trips', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 6 },
        { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
      ],
     products: [
       {
         img: 'http://opencart.opencartworks.com/themes/so_alimart/layout6/image/cache/catalog/demo/category/cate5-150x130.jpg',
         category: 'Electronics',
         price: '$100.00'
       },
       {
         img: 'http://opencart.opencartworks.com/themes/so_alimart/layout6/image/cache/catalog/demo/category/a12-150x130.jpg',
         category: 'Cosmetics',
         price: '$100.00'
       },
       {
         img: 'http://opencart.opencartworks.com/themes/so_alimart/layout6/image/cache/catalog/demo/category/a16-150x130.jpg',
         category: 'Fashion',
         price: '$100.00'
       },
       {
         img: 'http://opencart.opencartworks.com/themes/so_alimart/layout6/image/cache/catalog/demo/category/a7-150x130.jpg',
         category: 'Camera',
         price: '$100.00'
       },
       {
         img: 'http://opencart.opencartworks.com/themes/so_alimart/layout6/image/cache/catalog/demo/category/cate6-150x130.jpg',
         category: 'Furniture',
         price: '$100.00'
       },
       {
         img: 'http://opencart.opencartworks.com/themes/so_alimart/layout6/image/cache/catalog/demo/category/cate8-150x130.jpg',
         category: 'Gifts',
         price: '$100.00'
       }
     ],
     icons: [
        'fab fa-facebook',
        'fab fa-twitter',
        'fab fa-google-plus',
        'fab fa-linkedin',
        'fab fa-instagram',
      ],
      }

},
// idk why i still have this here...
    methods:{
        html5:function(type){
        return '<!DOCTYPE '+type+'>';
  }
}
});
