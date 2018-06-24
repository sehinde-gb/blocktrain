import { getLocalUser } from "./helpers/auth";


const user = getLocalUser();


export default {
    state: {
        currentUser: user,
        isLoggedIn: !! user,
        loading: false,
        auth_error: null,
        reg_error: null,
        swipe_error: null,
        endingFare: "10.00",
        journeys: [],
        links: [
            'http://google.com',
            'http://coursetro.com',
            'http://youtube.com'
        ]
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

        swipe(state) {
            state.loading = true;
            state.swipe_error = null;
        },

        swipeSuccess(state, payload) {
            state.swipe_error = null;
            state.isLoggedIn = true;
            state.loading = false;

            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});

            localStorage.setItem('user', JSON.stringify(state.currentUser));
        },

        swipeFailed(state, payload){
            state.loading = false,
                state.swipe_error = payload.error;
        },

        ADD_STATION: (state, station) => {
            state.stations.push(station)
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
        },
        swipeError(state) {
            return state.swipe_error;
        },
        endingFare(state) {
            return state.endingFare;
        }
    },
    actions: {
        login(context) {
            context.commit("login");
        },

        register(context) {
            context.commit("register");
        },

        swipe(context) {
            context.commit("swipe");
        }
    }

}
