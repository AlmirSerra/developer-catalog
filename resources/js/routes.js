const Home = ()=> import('./components/Home.vue');

const Show = ()=> import('./components/developers/Show.vue');
const Create = ()=> import('./components/developers/Create.vue');
const Edit = ()=> import('./components/developers/Edit.vue');

const ShowLevel = ()=> import('./components/levels/ShowLevel.vue');
const CreateLevel = ()=> import('./components/levels/CreateLevel.vue');
const EditLevel = ()=> import('./components/levels/EditLevel.vue');


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
        path: '/developers/create',
        component: Create
    },
    {
        name: 'editDevelopers',
        path: '/edit/:id',
        component: Edit
    },
    {
        name: 'showLevel',
        path: '/levels',
        component: ShowLevel
    },
    {
        name: 'createLevel',
        path: '/levels/create',
        component: CreateLevel
    },
    {
        name: 'editLevel',
        path: '/levels/edit/:id',
        component: EditLevel
    }
];