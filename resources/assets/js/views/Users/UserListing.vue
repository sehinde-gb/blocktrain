<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <br>
                        <h2>My Zorra Cards</h2>
                            <hr/>
                            

                            <div v-for="user in users" class="single-card">
                                <br>
                                 <ul class="list-group">
                                   
                                     <div class="card" style="width: 18rem;">
                                         <div class="card-body">
                                             <h5 class="card-title">Card Number:  {{ user.id }}</h5>
                                             
                                             <h6 class="card-subtitle mb-2 text-muted">Current Balance: {{ current_balance | currency('£') }}</h6>
                                             
                                             <p class="card-text">Card Management</p>
                                             <router-link class="card-link" v-bind:to="  '/users/' + user.id"><h6>View / Change Card  </h6></router-link>
                                             <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/topup'"><h6>Top Up  </h6></router-link>
                                             <router-link class="card-link" to="/users/register"><h6> New Card </h6></router-link>
                                             <br>
                                             <p class="card-text">Journeys</p>
                                             <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/make/journey'"><h6>Start Journey</h6></router-link>
                                             <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/journeys'"><h6>Journey History</h6></router-link>
                                             <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/blockchain'"><h6>My BlockChain</h6></router-link>
                                         </div>
                                     </div>
                                    
                                </ul>
                            </div><!-- .single-card -->
                    </div><!-- .lead-form -->
                </div> <!-- .col-8 -->
               <SideMenu></SideMenu>
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
    </div>
</template>

<script>

import SideMenu from './SideMenu.vue';
    

    export default {
        
        components: { SideMenu},

        created() {
            //this.fetchUserList();
             this.$store.dispatch( 'loadUsers', {
                id: this.$route.params.id
            });

            this.$store.dispatch('loadJourneys', {
                id: this.$route.params.id
            });

        },
        computed: {
            
            journeys() {
                return this.$store.getters.journeys
            },

            total: function() {
                    //console.log(this.journeys);
                    return this.journeys.reduce(function(total, item){
                       return total + item.endingFare;
                    },0);
                    
            },

            balance: function() {
                //console.log(this.users);
                var item = 0
                return this.users.reduce(function(balance, item){
                    return balance + item.balance;
                },0);
            },

            current_balance: function() {
                return (this.balance - this.total) / 100;
            },

    
            usersLoadStatus() {
        
                return this.$store.getters.getUsersLoadStatus;
            },

            users() {
                return this.$store.getters.getUsers;
            },

             journeys() {
                return this.$store.getters.getJourneys;
            },

            

            
            
        }
        
        
    }
</script>