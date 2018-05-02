<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h2 class="text-center">Journey Listings</h2>
                          
                          <div v-for="journey in journeys">
                              <router-link v-bind:to="  '/card/' + journey.card_id + '/journey/' + journey.id"><h4>Journey: {{ journey.id }} </h4></router-link>
                          </div>
                            
                       
                    </div>
                </div> <!-- end of .col-md-6.col-md-offset-3 -->
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
    </div>
</template>

<script>
    export default {

        created() {
            this.fetchJourneyList();
            
        },

        data() {
            return {
                journeys: [],
                id: this.$route.params.id
               
            }

        },
        methods: {
            fetchJourneyList() {
                this.$http.get('https://blocktrain.test/api/card/' + this.id + '/journey').then((response) => {
                    //console.log(response.data.data.data);
                    
                    this.journeys = response.data.data.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>