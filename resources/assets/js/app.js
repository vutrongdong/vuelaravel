
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');
 var Vue =require('vue');
 Vue.use(require('vue-resource'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
 import Router from './router/router.js';
 import VeeValidate from 'vee-validate';
 import Notifications from 'vue-notification'

/*
or for SSR:
import Notifications from 'vue-notification/dist/ssr.js'
*/

Vue.use(Notifications)
Vue.use(VeeValidate);
Vue.component('App', require('./App.vue'));

const app = new Vue({
    el: '#app',
    router: Router,
});
