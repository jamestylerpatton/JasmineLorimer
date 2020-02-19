/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

require('./nav-slide');

// Initialize IG Feed
/* let Instafeed = require("./vendor/instafeed.js");
let feed = new Instafeed({
  target: 'ig-feed',
  get: 'user',
  resolution: 'low_resolution',
  sortBy: 'most-recent',
  limit: 6,
  accessToken: '13069122.1677ed0.bb32500f9f6145a2aee0a77939a9c608',
  template: '<div class="item"><a href="{{link}}" target="_blank"><img title="{{caption}}" src="{{image}}" /></a></div>'
});
feed.run(); */
