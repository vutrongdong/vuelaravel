import Vue from 'vue';
import VueRouter from 'vue-router';
import Login from '../authentication/login.vue';
import Register from '../authentication/register.vue';
import Category from '../components/ListCate.vue';
import CateAdd from '../components/AddCate.vue';
import CateUpdate from '../components/UpdateCate.vue';
Vue.use(VueRouter);

const router  = new VueRouter({
    routes:[
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
