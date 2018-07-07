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
                                             <h6 class="card-subtitle mb-2 text-muted">Balance: {{ user.balance }}</h6>
                                             
                                             
                                             <h2>{{ total }}</h2>
                                             <p class="card-text">Card Management</p>
                                             <router-link class="card-link" v-bind:to="  '/users/' + user.id"><h6>View / Change Card  </h6></router-link>
                                             <router-link class="card-link" to="/users/register"> New Card</router-link>
                                             <br>
                                             <p class="card-text">Journeys</p>
                                             <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/make/journey'"><h6>Start Journey</h6></router-link>
                                             <router-link class="card-link" v-bind:to="  '/users/' + user.id + '/journeys'"><h6>Journey History</h6></router-link>
                                         </div>
                                     </div>
                                    
                                </ul>
                            </div><!-- .single-card -->
                    </div><!-- .lead-form -->
                </div> <!-- .col-8 -->
                <div class="col-4">
                    <h2 class="list-group-item text-center text-uppercase">My Account</h2>
                    <ul class="list-group-item">
                        <a class="list-group-item text-center" href="#">Contactless</a>
                        <a class="list-group-item text-center" href="#">Change My Password</a>
                        <a class="list-group-item text-center" href="#">Order History</a>
                        <a class="list-group-item text-center" href="#">Delay Refunds</a>
                        <a class="list-group-item text-center" href="#">Change My Password</a>
                        <a class="list-group-item text-center" href="#">Help</a>
                        <a class="list-group-item text-center" href="#">View Change Details</a>
                        <a class="list-group-item text-center" href="#">Log Out</a>
                    </ul>
                    
                </div>
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
    </div>
</template>

<script>

    

    export default {
      
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
                var list = this.$store.getters.journeys
                var sum = 0
                for(var listProps in list) { 
                    list[listProps].journeys.forEach(function (journey) { 
                    sum += journey.endingFare - journey.end_balance  
                    }) 
                } 
                return sum; 
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
        
        // data() {
        //     return {
        //         users: [],
        //         id: ''
                
                
        //     }
        // },
        // methods: {

        //     fetchUserList() {
        //         axios.get('/api/user').then((response) => {
        //             //console.log(response.data);
        //             this.users = response.data;
        //         });
        //     }
        // }
    }
</script>