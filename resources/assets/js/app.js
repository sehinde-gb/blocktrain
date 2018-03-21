
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router'

window.Vue = require('vue');

Vue.use(VueRouter)
window._ = require('lodash');

import App from './views/App'
import Journey from './views/Journey'
import Home from './views/Home'
import JourneysIndex from './views/JourneysIndex'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('show-blogs', require('./components/ShowBlogs.vue'));
//Vue.component('journey-form', require('./components/JourneyForm.vue'));


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



