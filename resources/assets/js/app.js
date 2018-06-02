
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


import App from './views/App'
import DashboardPage from './views/DashboardPage'
import HomePage from './views/HomePage'
import OriginalPage from './views/Original/OriginalPage'
import User from './views/User'
import Users from './views/Ratings/Users'
import CreateJourney from './views/CreateJourney'
import CardListings from './views/Cards/CardListings'
import CardDetail from './views/Cards/CardDetail'
import JourneyListings from './views/Journeys/JourneyListings'
import JourneyDetail from './views/Journeys/JourneyDetail'
import CardRegister from './views/Cards/CardRegister'
import StoreData from './store'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



Vue.component('example-component', require('./components/ExampleComponent.vue'));

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    mode: 'history',
    routes: [

        {
            path: '/',
            name: 'home',
            component: HomePage
        },

        {
            path: '/dashboard',
            name: 'dashboard',
            component: DashboardPage
        },

        {
            path: '/original',
            name: 'original',
            component: OriginalPage,
        },

        {
            path: '/register',
            name: 'card.register',
            component: CardRegister
        },

        {
            path: '/cards',
            name: 'card.listings',
            component: CardListings
        },

        {   path: '/card/:id',
            name: 'card.detail',
            component: CardDetail
        },

        {
            path: '/card/:id/journeys',
            name: 'journey.listings',
            props: true,
            component:JourneyListings,
        },

        {
            path: '/card/:id/journey/:journey',
            name: 'journey.detail',
            component:JourneyDetail,
        },

        {   path: '/card/:id/create/journey',
            name: 'journey.create',
            props: true,
            component: CreateJourney,
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

//     /*router.beforeEach((to, from, next) => {
//      //console.log('Global -- beforeEach - fired')
//
//     // re-route
//     if (to.path === '/') {
//       //  next('/journey')
//     }
//     // Abort navigation based on some criteria:
//     //else if (to.path === '/user/1') {
//       // next(false)
//     //}
//    else if (to.path === '/error') {
//      //   const err = new Error('My Error Message')
//
//         // pass the error to onError() callback.
//        // next(err)
//     }
//     else {
//         next()
//     }
// })
//
// // Global beforeResolve
// router.beforeResolve((to, from, next) => {
// //console.log('Global -- beforeResolve - fired.')
//     next()
// })
//
// // GLobal AFTER hooks:
// router.afterEach((to, from) => {
//     // This fires after each route is entered.
//     //console.log(`Global -- afterEach - Just moved from '${from.path}' to '${to.path}'`)
// })
//
// // Register an Error Handler:
// router.onError(err => {
//     console.error('Handling this error', err.message)
// })
// */

const app = new Vue({

    el: '#app',

    components: { App },
    router,
    store
});



