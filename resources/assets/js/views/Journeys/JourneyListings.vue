<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <h2 class="text-center">Journey Listings</h2>
                        <hr/>
                          
                          <div v-for="journey in journeys">
    
                              <ul class="list-group">
                                  <router-link  class="list-group-item" v-bind:to="  '/users/' + user_id + '/journeys/' + journey.id"><h6>{{ moment(journey.created_at).format("dddd, MMMM Do YYYY, h:mm:ss a") }} </h6></router-link>
    
                                  
                              </ul><!-- end list-group -->
                              
                          </div><!-- end of div -->
                    </div><!-- .lead-form -->
                </div><!-- .col-8 -->
                <div class="col-4">
                    <h2>My Account</h2>
                    <ul>
                        <a href="#">Contactless</a>
        
                    </ul>
                </div><!-- .col-4 -->
            </div><!-- .row -->
            
    
    <hr/>
            <a class="btn btn-outline-primary btn-lg" role="button"><router-link to="/users">Back </router-link></a>
                    
            
        </div> <!-- end of .container -->
    </div>
</template>

<script>
    var moment = require('moment');
    
    export default {
        
        
        created() {
             //this.fetchJourneyList();
             this.$store.dispatch( 'loadJourneys', {
                 user_id: this.$route.params.id
             });
        },

        
        computed: {
            

            /*
                Gets the journeys load status
            */
            journeysLoadStatus() {
        
                return this.$store.getters.getJourneysLoadStatus;
            },

            journeys() {
                return this.$store.getters.getJourneys;
            }
        },

        

        data() {
            return {
                moment: moment,
                //journeys: [],
                user_id: this.$route.params.id
               
            }

        },
        methods: {
            // fetchJourneyList() {
            //     axios.get('/api/user/' + this.id + '/journey').then((response) => {
            //         //console.log(response.data.data.data);
                    
            //         this.journeys = response.data.data.data;
            //     });
            // }
        }
    }
</script>

<style scoped>

</style>