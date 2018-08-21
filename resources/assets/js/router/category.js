import Vue from 'vue';
import VueRouter from 'vue-router';
import Category from '../components/ListCate.vue';
Vue.use(VueRouter);

const router  = new VueRouter({
    routes:[
    {
        path: '/category',
        component: Category
    }
    ]
})

