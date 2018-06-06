import { getLocalUser } from "./helpers/auth";

const user = getLocalUser();


export default {
    state: {
        currentUser: user,
        isLoggedIn: !! user,
        loading: false,
        auth_error: null,
        reg_error: null,
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
        },
    },
    actions: {
        login(context) {
            context.commit("login");
        },

        register(context) {
            context.commit("register");
        }
    }

}
