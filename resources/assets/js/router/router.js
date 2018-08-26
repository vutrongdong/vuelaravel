import Vue from 'vue';
import VueRouter from 'vue-router';
import Login from '../authentication/login.vue';
import Register from '../authentication/register.vue';
import Category from '../components/category/ListCate.vue';
import CateAdd from '../components/category/AddCate.vue';
import CateUpdate from '../components/category/UpdateCate.vue';
import Product from './product.js';
import Role from './role.js';
import User from './user.js';
Vue.use(VueRouter);

const router  = new VueRouter({
// mode:'history',
 routes:[
 ...Product,
 ...Role,
 ...User,
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
}
]
})


export default router
