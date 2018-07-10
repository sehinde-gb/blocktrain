<template>

    <div>
    
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <h2 class="text-center">View or Change Details</h2>
                        <br/>
                        <h5 class="text-center">Welcome {{ user.name }}</h5>
                        <br/>
                            <div class="card text-center">
                                <div class="card-header">
                                    Card No: {{ user.id }}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Address: {{ user.address }}</p>
                                    <p class="card-text">Land Phone: {{ user.home_phone }}</p>
                                    <p class="card-text">Mobile Phone: {{ user.mobile_phone }}</p>
                                    <p class="card-text">Email: {{ user.email }}</p>
                                    
                                             
                                    <a class="btn btn-outline-primary"><router-link to="/users">Back </router-link></a>

                                   
                                </div>
                                <div class="card-footer text-muted">
                                    Created {{ moment(user.created_at).fromNow() }}
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
 
import { mapGetters } from 'vuex';
import SideMenu from './SideMenu.vue';

export default {
    
    components: { SideMenu},

    data() {
        return {
            id: this.$route.params.id,
            moment: moment,
            user: {}
            //journey: {}
        }
    },

    created() {
        this.fetchAUser();
        
        //this.$store.dispatch( 'loadJourneys', {
            //   user_id: this.$route.params.id
            //});
        
        // this.$store.dispatch('loadUser', {
        //       id: this.$route.params.id
        // });
    },

    computed: {

    //     total: function() {
    //             console.log(this.journeys);
    //         return this.journeys.reduce(function(total, item){
    //             return total - item.endingFare;
    //         },0);
    //     },

    //    currentJourney() {
    //        return this.$store.getters.getjourneysById(1);
    //    }
        
        
    
    // currentUser() {
    //     return this.$store.getters.currentUser;
    // },

    // userLoadStatus() {
    //     return this.$store.getters.getUserLoadStatus;

    // },

    // user() {
    //     return this.$store.getters.getUser;
    // }


    
    // /*
    //     Gets the journeys load status
    // */
    // journeysLoadStatus() {

    //     return this.$store.getters.getJourneysLoadStatus;
    // },

    // journeys() {
    //     return this.$store.getters.getJourneys;
    // }
    },
    methods: {
        fetchAUser() {
            this.$http.get('/api/user/' + this.id).then((response) => {
                //console.log(response);
                this.user = response.body;
            });
        }
    }
    
    // filters: {
    //     toUpperCase(value) {
    //         return value.toUpperCase();
    //     }
    // }
}
</script>

<style scoped>
    #single-card {
        max-width: 960px;
        margin: 0 auto;
    }
</style>