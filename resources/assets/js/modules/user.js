
import UserAPI from '../api/user.js';
import { getLocalUser } from "../helpers/auth";

const user = getLocalUser();

export const users = {

    /*
        Defines the state being monitored for the module.
    */
    
    state: {
        users: [],
        user: {},
        usersLoadStatus: 0,
        userLoadStatus: 0,
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: null,
        reg_error: null,
        addJourney_error: null,
        journeys: [],
        new_balance: null    
    },

    /*
        Defines the actions used to retrieve the data.
    */

    actions: {

        /*
          Loads an individual user from the API
        */    

        loadUser({ commit}, data) {
                commit('setUserLoadStatus', 1);

                UserAPI.getUser(data.id)
                    .then(function(response) {
                        commit('setUser', response.data);
                        commit('setUserLoadStatus', 2);
                    })
                    .catch(function() {
                        commit('setUser', {});
                        commit('setUserLoadStatus', 3);
                });
        },
        
        /*
          Load the users from the API
        */
        loadUsers( { commit }, data) {
            commit('setUsersLoadStatus', 1);    

            UserAPI.getUsers(data.user_id)
                .then(function(response) {
                    commit('setUsers', response.data);
                    commit('setUsersLoadStatus', 2);
                })
                .catch(function(){
                    commit('setUsers', []);
                    commit('setUsersLoadStatus', 3);
                });
            
        },
        
        /*
            Updates the balance on the User API
        */

       addBalance({ commit, state, dispatch }, data){
            commit( 'setBalanceAddedStatus', 1);
            UserAPI.putAddBalance( data.user_id, data.balance)
            .then( function(response){
                commit('setBalanceAddedStatus', 2);
                
            })
            .catch( function() {
                commit('setBalanceAddedStatus', 3);
            });

        },
            
        /*
            Fires the login method commit
        */ 

        login(context) {
            context.commit("login");
        },

        /*
            Fires the register method commit
        */ 
        register(context) {
            context.commit("register");
        },
    },    
    
    /*
       Defines the mutations used
    */

    mutations: { 
        
        /*
            Sets the users
        */

        setUsers(state, users) {
            state.users = users;    
        },

        /*
            Set the user
        */
        setUser( state, user) {
            state.user = user;
        },


        /*
            Sets the users load status
        */
        setUsersLoadStatus( state, status) {
            state.setUsersLoadStatus = status;
        },

        
        /*
            Sets the user load status
        */
        setUserLoadStatus( state, status) {
            state.userLoadStatus = status;
        },

         /*
            Set the balance add status
        */
        setBalanceAddedStatus( state, status ) {
            state.balanceAddStatus = status;
        },

    

        /*
            Set the logged in userr
        */
        login(state) {
            state.loading = true;
            state.auth_error = null;
            },

        /*
            Sets the logged in flag and the loading flag to false and 
            assigns the access token to the user and stores
            the current user in the local storage state.
        */

        loginSuccess(state, payload) {
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});

            localStorage.setItem('user', JSON.stringify(state.currentUser));
        },

        /*
            Set the loginFailed flag 
        */

        loginFailed(state, payload) {
            state.loading = false;
            state.auth_error = payload.error;
        },

        /*
            Logs the user out and removes the local stored user
        */
        logout(state) {
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;
        },

        /*
            Registers the new user

        */

        register(state) {
            state.loading = true;
            state.reg_error = null;
        },

        /*
            Sets the logged in flag and the loading flag to false and 
            assigns the access token to the user and stores
            the current user in the local storage state.
        */

        registerSuccess(state, payload) {
            state.reg_error = null;
            state.isLoggedIn = false;
            state.loading = false;

            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});

            localStorage.setItem('user', JSON.stringify(state.currentUser));
        },

        /*
        Sets the state to register failed
        */


        registerFailed(state, payload){
            state.loading = false,
            state.reg_error = payload.error;
        }

        
            
        
    },
 
    
    getters: {  
        /*
            Returns the users load status.
        */    
        getUsersLoadStatus( state) {
            return state.getUsersLoadStatus;
        },

        /*
            Returns the users.
        */   

        getUsers(state) {
            return state.users;
        },

        /*
            Returns the user.
        */   

        getUser(state) {
            return state.user;
        },

        new_balance: state => {
            var new_balance = state.users.map(user => {
                return {
                    balance: user.balance / 2
                }
            });
            return new_balance;
        },


        /*
            Returns the ticket load status.
        */   

        getUserLoadStatus( state) {
            return state.userLoadStatus;
        },

        /*
            Sets the state to is loading
        */ 
       isLoading(state) {
        return state.loading;
        },

        /*
            Sets the state to isLoggedIn
        */ 
        isLoggedIn(state) {
            return state.isLoggedIn;
        },

        /*
            Sets the state to currentUser
        */ 
        currentUser(state) {
            return state.currentUser;
        },

        /*
            Sets the authError flag
        */ 
        authError(state) {
            return state.auth_error;
        },

        /*
            Sets the reg error 
        */ 
        regError(state) {
            return state.reg_error;
        }

        
    }    


}