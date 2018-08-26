import ListUser from '../components/users/ListUser.vue';
import AddUser from '../components/users/AddUser.vue';
import EditUser from '../components/users/EditUser.vue';

export default [
    {
        path: '/users',
        component: ListUser,
        name:'ListUser'
    },
    {
        path: '/users/create',
        component:AddUser,
        name:'AddUser'
    },
    {
        path: '/users/:iduser/update',
        component: EditUser,
        name:'EditUser'
    }
];
