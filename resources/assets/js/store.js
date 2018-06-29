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



//import user from '../store.js';




const user = getLocalUser();


export default new Vuex.Store ({

    state: {
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: null,
        reg_error: null,
        addJourney_error: null,
        users: [],
        journeys: []        
    },
    mutations: {
        login(state) {
            state.loading = true;
            state.auth_error = null;
        },

        loginSuccess(state, payload) {
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});

            localStorage.setItem('user', JSON.stringify(state.currentUser));
        },

        loginFailed(state, payload) {
            state.loading = false;
            state.auth_error = payload.error;
        },

        logout(state) {
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;
        },
        register(state) {
            state.loading = true;
            state.reg_error = null;
        },

        registerSuccess(state, payload) {
            state.reg_error = null;
            state.isLoggedIn = true;
            state.loading = false;

            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});

            localStorage.setItem('user', JSON.stringify(state.currentUser));
        },

        registerFailed(state, payload){
            state.loading = false,
            state.reg_error = payload.error;
        },

        SET_USERS(state, users) {
            state.users = users
        }

        

    
    },
    getters: {
        isLoading(state) {
            return state.loading;
        },
        isLoggedIn(state) {
            return state.isLoggedIn;
        },
        currentUser(state) {
            return state.currentUser;
        },

        authError(state) {
            return state.auth_error;
        },
        regError(state) {
            return state.reg_error;
        }
        
        
        
    },
    actions: {

        login(context) {
            context.commit("login");
        },

        register(context) {
            context.commit("register");
        },

        loadUsers ({commit}) {
            axios.get('/api/user').then(response => 
                  response.data)
                  .then(users => {
                      commit('SET_USERS', users)
                  })
                //this.users = response.data;    
        }
        
    }
})

 
/*
  Exports our data store.
*/
// export default new Vuex.Store({
//     modules: {
//         journeys
//         //users

//     }
// });


