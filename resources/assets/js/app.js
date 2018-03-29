
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';
import VueResource from 'vue-resource';

window.Vue = require('vue');


Vue.use(VueRouter);
Vue.use(VeeValidate);
Vue.use(VueResource);


import App from './views/App'
import Journey from './views/Journey'
import Home from './views/Home'
import JourneysIndex from './views/JourneysIndex'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('balance-form', require('./components/balance.vue'));
//Vue.component('index-form', require('./components/index.vue'));
//Vue.component('fares-form', require('./components/fares.vue'));
//Vue.component('card-form', require('./components/new-card.vue'));


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/journey',
            name: 'journey',
            component: Journey,
        },
        {
            path: '/journeys',
            name: 'journeys.index',
            component: JourneysIndex,

        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});



