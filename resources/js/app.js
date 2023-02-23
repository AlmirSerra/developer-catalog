require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './components/App.vue';
import Home from './components/Home.vue';
import DeveloperList from './components/Developer/List.vue';
import DeveloperCreate from './components/Developer/Create.vue';
import DeveloperEdit from './components/Developer/Edit.vue';
import LevelList from './components/Level/List.vue';
import LevelCreate from './components/Level/Create.vue';
import LevelEdit from './components/Level/Edit.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/developers',
            name: 'developer.list',
            component: DeveloperList
        },
        {
            path: '/developers/create',
            name: 'developer.create',
            component: DeveloperCreate
        },
        {
            path: '/developers/:id/edit',
            name: 'developer.edit',
            component: DeveloperEdit
        },
        {
            path: '/levels',
            name: 'level.list',
            component: LevelList
        },
        {
            path: '/levels/create',
            name: 'level.create',
            component: LevelCreate
        },
        {
            path: '/levels/:id/edit',
            name: 'level.edit',
            component: LevelEdit
        }
    ]
});

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
