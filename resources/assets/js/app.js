
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


import App from './views/App'
import DashboardPage from './views/DashboardPage'
import HomePage from './views/HomePage'
import JourneyPage from './views/JourneyPage'
import store from './store';
import ConfirmationPage from './views/ConfirmationPage'
import User from './views/User'
import Users from './views/Users'
import Message from './views/Message'
import Input from './views/Input'
import ParentCard from './views/ParentCard'
import Swipe from './views/Swipe'

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
            path: '/dashboard',
            name: 'dashboard',
            component: DashboardPage
        },
        {
            path: '/',
            name: 'home',
            component: HomePage
        },

        {
            path: '/journey',
            name: 'journey',
            component: JourneyPage,
        },

        {
            path: '/message',
            name: 'message',
            component: Message
        },
        {
            path: '/input',
            name: 'input',
            component: Input
        },

        {
            path: '/parent',
            name: 'parent',
            component: ParentCard
        },

        {
            path: '/swipe',
            name: 'swipe',
            component: Swipe
        },


        {
            path: '/confirmation',
            name: 'confirmation',
            component: ConfirmationPage,
        },

        {
            path: '/users',
            name: 'users',
            component: Users,

        },

        {
            path: "/user/:userId",
            name: "user",
            component: User,
            props: true,
            // set nav guard on the route definition object:
            beforeEnter: (to, from, next) => {
                console.log('Entering User', to.params.userId)
                to.params.myCustomizations = {

                }
                next()
            }
        }

    ],

});

/* ===========================================
              GLOBAL GUARDS
 =========================================== */

    router.beforeEach((to, from, next) => {
     //console.log('Global -- beforeEach - fired')

    // re-route
    if (to.path === '/') {
      //  next('/journey')
    }
    // Abort navigation based on some criteria:
    //else if (to.path === '/user/1') {
      // next(false)
    //}
   else if (to.path === '/error') {
     //   const err = new Error('My Error Message')

        // pass the error to onError() callback.
       // next(err)
    }
    else {
        next()
    }
})

// Global beforeResolve
router.beforeResolve((to, from, next) => {
//console.log('Global -- beforeResolve - fired.')
    next()
})

// GLobal AFTER hooks:
router.afterEach((to, from) => {
    // This fires after each route is entered.
    //console.log(`Global -- afterEach - Just moved from '${from.path}' to '${to.path}'`)
})

// Register an Error Handler:
router.onError(err => {
    console.error('Handling this error', err.message)
})








const app = new Vue({

    el: '#app',

    components: { App },
    router,
    store
});



