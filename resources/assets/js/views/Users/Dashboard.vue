<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <br>

                        <h2>Your Dashboard</h2>
                            <hr/>

                            <div v-for="user in users" class="single-card">
                                <br>

                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title"><router-link class="card-link" v-bind:to="  '/users/' + user.id + '/new/start'"><i class="fa fa-plus" aria-hidden="true"></i><h6>New Journey</h6></router-link></h5>
                                        <p class="card-text">Start Your New Journey Here</p>
                                    </div>
                                </div>     
                                <br/>

                                 <ul class="list-group">
                                     <div class="card" style="width: 18rem;">
                                         <div class="card-body">
                                             <i class="fa fa-id-card" aria-hidden="true"></i>

                                             <h6 class="card-title">Card No:  {{ user.id }}</h6>
                                              <br/>      
                                                  
                                                   <p class="card-text">Card Management</p>
                                                    <h6 class="card-subtitle mb-2 text-muted">Current Balance: {{ current_balance | currency('£') }}</h6>
                                                     <br/>
                                                     <i class="fa fa-wrench" aria-hidden="true"></i>
                                                    <router-link class="card-link" v-bind:to="  '/users/' + user.id"><h6>Edit Card  </h6></router-link>
                                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                    <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/topup'"><h6>Top Up</h6></router-link>        
                                                    <hr>
                                                    <i class="fa fa-subway" aria-hidden="true"></i>
                                                    <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/journeys'"><h6>Journeys</h6></router-link>
                                                    <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/journeys'"><h6>Incomplete Journeys</h6></router-link>
                                                                                         
                                                    <br>                                            
                                                    <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/blockchain'"><h6>BlockChain</h6></router-link>
                                             
                                         </div>
                                     </div>
                                    <br/>

                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"><router-link class="card-link" v-bind:to="  '/users/' + user.id + '/make/journey'"><i class="fa fa-plus" aria-hidden="true"></i><h6>Add An Existing Card</h6></router-link></h5>
                                            <p class="card-text">Add An Existing Card Here</p>
                                          
                                        </div>
                                    </div>     

                                    <br/>
                                    
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"><router-link class="card-link" to="/users/register"><i class="fa fa-plus" aria-hidden="true"></i><h6> New Card </h6></router-link></h5>
                                            <p class="card-text">Get A New Card</p>   
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