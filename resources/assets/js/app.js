
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
window.Event = new Vue();

export const bus = new Vue();

Vue.use(VueRouter);
Vue.use(VeeValidate);
Vue.use(VueResource);


import App from './views/App'
import Home from './views/Home'
import Swipe from './views/Swipe'
import store from './store';
import Cards from './views/Cards'
import FirstRoute from './views/FirstRoute'
import FirstRouteChild from './views/FirstRouteChild'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



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
            path: '/cards',
            name: 'cards',
            component: Cards,
        },

        {
            path: '/firstroute/:name',
            name: 'FirstRoute',
            component: FirstRoute,
            children: [
                {
                    path: 'child',
                    component: FirstRouteChild
                }
            ]
        },


        {
            path: '/swipe',
            name: 'swipe',
            component: Swipe,
        }



    ],
});



const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store
});



