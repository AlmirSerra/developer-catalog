const Home = ()=> import('./components/Home.vue');

const Show = ()=> import('./components/developers/Show.vue');
const Create = ()=> import('./components/developers/Create.vue');
const Edit = ()=> import('./components/developers/Edit.vue');

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'showDevelopers',
        path: '/developers',
        component: Show
    },
    {
        name: 'createDevelopers',
        path: '/create',
        component: Show
    },
    {
        name: 'editDevelopers',
        path: '/edit/:id',
        component: Edit
    },
];