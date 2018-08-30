import Vue from 'vue';
import VueRouter from 'vue-router';
import Register from '../authentication/register.vue';
import Auth from './auth.js';
import Product from './product.js';
import Role from './role.js';
import User from './user.js';
import Post from './post.js';
import Category from './category.js';
Vue.use(VueRouter);

const router  = new VueRouter({
// mode:'history',
    routes:[
    ...Auth,
    ...Product,
    ...Role,
    ...User,
    ...Post,
    ...Category,
    {
        path: '/register',
        component: Register
    },
    ]
})


export default router
