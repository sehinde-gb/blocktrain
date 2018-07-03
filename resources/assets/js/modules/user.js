
import UserAPI from '../api/user.js';

const user = getLocalUser();

export const users = {

    /*
        Defines the state being monitored for the module.
    */
    
    state: {
        users: [],
        usersLoadStatus: 0,
        user: {},
        userLoadStatus: 0,
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: null,
        reg_error: null,
        addJourney_error: null,
        journeys: []    
    },

    /*
    Defines the actions used to retrieve the data.
    */

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
            Sets the user
        */
        setUser( state, user) {
            state.user = user;
        },

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
 
    actions: {
     

        /*
            Load the tickets from the API
        */
        loadUsers( { commit }, data){
            commit('setUsersLoadStatus', 1);    
    

            UserAPI.getUsers(data.user_id)
                .then(function(response) {
                    commit('setUsers', response.data.data);
                    commit('setUsersLoadStatus', 2);
                })
                .catch(function(){
                    commit('setUsers', []);
                    commit('setUsersLoadStatus', 3);
                });
            },

        /*
            Loads an individual user from the API
        */    
    
        loadUser({ commit}, data, id) {
            commit('setUserLoadStatus', 1);

            UserAPI.getUser(data.id)
                .then(function(response) {
                    commit('setUser', response.body.data);
                    commit('setUserLoadStatus', 2);
                })
                .catch(function() {
                    commit('setUser', {});
                    commit('setUserLoadStatus', 3);
                });
        },

        login(context) {
            context.commit("login");
        },

        register(context) {
            context.commit("register");
        },
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
            Returns the te.user.
        */   

        getUser(state) {
            return state.user;
        },

        /*
            Returns the ticket load status.
        */   

        getUserLoadStatus( state) {
            return state.userLoadStatus;
        },
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
    }    


}