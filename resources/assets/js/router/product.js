import AddPro from '../components/product/AddProd.vue';
import EditPro from '../components/product/UpdateProd.vue';
import ListPro from '../components/product/ListProd.vue';

export default [
    {
        path: '/product',
        component: ListPro
    },
    {
        path: '/product/create',
        component:AddPro
    },
    {
        path: '/product/:id/update',
        component: EditPro
    }
];
