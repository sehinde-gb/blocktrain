<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link class="navbar-brand" to="/">Block Train</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <template v-if="!currentUser">
                            <li>
                                <router-link to="/login" class="nav-link" exact v-show="!userIsRegistered">Login</router-link>
                            </li>
                            <li>
                                <router-link to="/register" class="nav-link" exact v-show="!userIsRegistered">Register</router-link>
                            </li>

                            
                        </template>
                        <template v-else>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                    {{ currentUser.name }} <span class="caret"></span>
                                    
                                </a>
        
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="#!" @click.prevent="logout" class="dropdown-item">Logout</a>
                                </div>
                            </li>
                            
                            
                            <li>
                                <router-link to="/users" class="nav-link">Dashboard</router-link>
                            </li>

                            <li class="nav-link"></li>
                            <li class="nav-link">
                                <strong :class="connectedClass">
                                    {{ bcConnected ? 'Connected' : 'Not Connected' }}
                                </strong>
                            </li>

                            
                        </template>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
     // importing common function
    import mixin from '../../../../libs/mixinViews';


    export default {

         mixins: [mixin],

         data() {
            return {
                tmoConn: null, // contain the intervalID given by setInterval
                tmoReg: null, // contain the intervalID given by setInterval
                connectedClass: 'text-danger', // bootstrap class for the connection status (red when not connected, green when connected)
                userIsRegistered: false, // true when the user that is visiting the page is registered
            }
        },

        methods: {
            logout() {
                this.$store.commit('logout');
                this.$router.push('/login');
            },
             /**
             * It checks if the visiting user is regitered calling every 500ms the function isRegistered
             * from the smart contract until the connection with the smart contract is established.
             */
            checkUserIsRegistered() {
                this.tmoConn = setInterval(() => {
                    // checking first if the connection with the blockchain is established
                    if (this.blockchainIsConnected()) {
                        // stopping the setInterval
                        clearInterval(this.tmoConn)
                        // showing the connected message on the top bar and setting the class too
                        this.connectedClass = 'text-success'

                        window.bc.contract().isRegistered.call((error, res) => {
                            if (error) {
                                console.error(error);
                            }
                            else {
                                this.userIsRegistered = res
                            }
                        })
                    }
                }, 500)
            },

            /**
             * Check if the user is registered calling the function of the smart contract isRegistered.
             * This function is used when the user is signing up.
             * The difference with the previous function is:
             *      - the function checkUserIsRegistered tries to check if the user is registered
             *        until the connection with the blockchain is established.
             *      - the function checkUntilUserIsRegistered tries to check if the user is registered
             *        until the user is registered.
             *
             * NOTE: in order to check if the user has been registered successfully the function has to check
             * several time because the block can take several minutes in order to be mined (depending on the
             * configuration of the blockchain you are using).
             */
            checkUntilUserIsRegistered() {
                this.tmoReg = setInterval(() => {
                    if (this.blockchainIsConnected()) {
                        window.bc.contract().isRegistered.call((error, res) => {
                            if (error) {
                                console.error(error)
                            }
                            else if (res) {
                                // stopping the setInterval
                                clearInterval(this.tmoReg)

                                this.userIsRegistered = res
                            }
                        })
                    }
                }, 1000)
            }
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser;
            }
        },
        created() {
            // when the event userregistered is fired (from the view Register.vue)
            // it runs the function checkUntilUserIsRegistered
            Event.$on('userregistered', this.checkUntilUserIsRegistered);

            this.checkUserIsRegistered()
        }
        
    }
</script>

<style scoped>
 header {
    background: lightgreen;
    padding: 10px;
 }

 h3 {
     padding: 10px;
     text-align: center;
 }

 p {
     text-align: center;
 }
</style>