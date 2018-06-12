
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';
//import VueResource from 'vue-resource';
import Vuex from 'vuex';


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
//Vue.use(VueResource);
Vue.use(Vuex);


import App from './views/App'

import StoreData from './store'

import {routes} from './routes';

import {initialise} from './helpers/general';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */





const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes,
    mode: 'history'

});



initialise(store, router);

const app = new Vue({

    el: '#app',

    components: { App },
    router,
    store
});



