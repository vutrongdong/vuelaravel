
import Category from '../components/category/ListCate.vue';
import CateAdd from '../components/category/AddCate.vue';
import CateUpdate from '../components/category/UpdateCate.vue';
export default [
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
];
