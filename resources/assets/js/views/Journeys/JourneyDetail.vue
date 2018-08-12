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
                            </div><!-- .card-header -->
                            <div class="card-body">
                                <h5 class="card-title">View Details</h5>
                                
                                <p class="card-text">From: {{ journey.from }}</p>
                                <p class="card-text">To: {{ journey.to }}</p>
                                <p class="card-text">Description: {{ journey.description }}</p>
                                <p class="card-text">Type of Journey: {{ journey.type }}</p>
                                <p class="card-text">Passenger Type: {{ journey.passengerType }}</p>
                                <p class="card-text">Mode: {{ journey.mode }}</p>
                                <p class="card-text">Fare: {{ journey.endingFare / 100 | currency('£') }}</p>
                                
                                
                                <a class="btn btn-outline-primary"><router-link v-bind:to="  '/users/' + journey.user_id + '/journeys'">Back</router-link></a>
                               
                                <a class="btn btn-outline-primary"><router-link to="/users">Dashboard </router-link></a>
                            </div><!-- .card-body -->
                            <div class="card-footer text-muted">
                                {{ moment(journey.created_at).fromNow() }}
                            </div><!-- .card-footer -->
                        </div><!-- .card -->
                
                    </div><!-- end of .lead-form -->
                </div><!-- end of .col-8 -->
                <SideMenu></SideMenu>
        
        
            </div> <!-- end of .row -->
    
        </div><!-- end of .container -->

    </div>
</template>

<script>
    var moment = require('moment');
    import SideMenu from '../Users/SideMenu.vue';
    
    export default {
    
        components: { SideMenu},

        created() {
            this.fetchJourneyDetail();
            
        },
        
        data() {
            return {
                journey: {},
                balance: '',
                id: this.$route.params.id,
                moment: moment
              
            }
        },
        
        methods: {
            fetchJourneyDetail() {
                axios.get('/api/user/' + this.id + '/journey/' + this.journey)
                    .then ((response) => {
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