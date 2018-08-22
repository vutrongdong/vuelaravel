import Vue from 'vue';
import VueRouter from 'vue-router';
import Product from './product.js';
import Login from '../authentication/login.vue';
import Register from '../authentication/register.vue';
import Category from '../components/category/ListCate.vue';
import CateAdd from '../components/category/AddCate.vue';
import CateUpdate from '../components/category/UpdateCate.vue';
import Index from '../components/index.vue';
Vue.use(VueRouter);

const router  = new VueRouter({
 // mode: 'history',
 // base:'dong/',
 routes:[
 ...Product,
 {
    path: '/login',
    component: Login
},
{
    path: '/register',
    component: Register
},
{
    path: '/category',
    component: Category
},
{
    path: '/category/add',
    component: CateAdd
},
{
    path: '/category/:idcate/update',
    component: CateUpdate
},
{
    path: '/',
    component: Index
}
]
})


export default router
