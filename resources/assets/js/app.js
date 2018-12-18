
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';
import VueResource from 'vue-resource';
import Vuex from 'vuex';
import Vue2Filters from 'vue2-filters';
import VueDisabled from 'vue-disabled'; 


window.Vue = require('vue');
window.Event = new Vue();

export const EventBus = new Vue();

Object.defineProperties(Vue.prototype, {
    $bus: {
        get: function () {
            return EventBus
        }
    }
})


Vue.use(VueRouter);
Vue.use(VeeValidate);
Vue.use(VueResource);
Vue.use(Vuex);
Vue.use(Vue2Filters);
Vue.use(VueDisabled);

import App from './views/App'



import {routes} from './routes';

import {initialise} from './helpers/general';

import {store} from './store.js'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const router = new VueRouter({
    routes,
    mode: 'history'

});



initialise(router, store);

const app = new Vue({

    el: '#app',

    components: { App },
    router,
    store
});



