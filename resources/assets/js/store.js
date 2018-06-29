import { getLocalUser } from "./helpers/auth";
import {journeys} from './modules/journey.js';
import {users} from './modules/user.js';
/*
    Imports Vue and Vuex
*/
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex);

/*
  Adds the promise polyfill for IE 11
*/
require('es6-promise').polyfill();


const user = getLocalUser(); 


 
/*
  Exports our data store.
*/
export default new Vuex.Store({
    modules: {
        journeys,
        users

    }
});


