j<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <h2 class="text-center">Journey History</h2>
                        <div class="card text-center">
                            <div class="card-header">
                                {{ moment(journey.created_at).format("dddd, MMMM Do YYYY, h:mm:ss a") }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">View Details</h5>
                                
                                <p class="card-text">From: {{ journey.from }}</p>
                                <p class="card-text">To: {{ journey.to }}</p>
                                <p class="card-text">Description: {{ journey.description }}</p>
                                <p class="card-text">Type of Journey: {{ journey.type }}</p>
                                <p class="card-text">Passenger Type: {{ journey.passengerType }}</p>
                                <p class="card-text">Mode: {{ journey.mode }}</p>
                                <p class="card-text">Ending Fare: {{ journey.endingFare }}</p>
                                <a class="btn btn-outline-primary"><router-link v-bind:to="  '/cards/' + journey.card_id + '/journeys'">Back</router-link></a>
                               
                                <a class="btn btn-outline-primary"><router-link to="/cards">Cards </router-link></a>
                            </div>
                            <div class="card-footer text-muted">
                                {{ moment(journey.created_at).fromNow() }}
                            </div>
                        </div><!-- .card -->
                
                
                    </div><!-- end of .col-8 -->
                </div>
                <div class="col-4">
                    <h2>My Account</h2>
                    <ul>
                        <a href="#">Contactless</a>
                
                    </ul>
            
                </div><!-- end of .col-4 -->
        
        
            </div> <!-- end of .row -->
    
        </div><!-- end of .container -->
    
        
    
       
    
        
      
    </div>
</template>

<script>
    var moment = require('moment');
    
    export default {
    
        created() {
            this.fetchJourneyDetail();
            
        },
        
        data() {
            return {
                journey: {},
                id: this.$route.params.id,
                moment: moment
              
            }
        },
        
        methods: {
            fetchJourneyDetail() {
                axios.get('/api/card/' + this.id + '/journey/' + this.journey).then
                
             
                ((response) => {
                    //console.log(response.data);
                    this.journey = response.data;
                });
            }
      
        }
    }
</script>

<style scoped>
    #single-journey {
        max-width: 960px;
        margin: 0 auto;
    }
</style>