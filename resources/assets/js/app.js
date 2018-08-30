
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
 import Notifications from 'vue-notification';
 import Sweetalert from 'sweetalert';
 import store from './store';
/*
or for SSR:
import Notifications from 'vue-notification/dist/ssr.js'
*/
import Logout from './authentication/logOut.vue';
Vue.use(Notifications);
Vue.use(VeeValidate);

const app = new Vue({
    el: '#app',
    components:{Logout},
    router: Router,
    store
});
