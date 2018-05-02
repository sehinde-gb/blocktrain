j<template>
    <div>
        <div id="single-journey">
            
            <h2>Your Journey </h2>
            
            <h3>From: {{ journey.from }}</h3>
            <h3>Destination: {{ journey.to }}</h3>
            <h3>Description: {{ journey.description }}</h3>
            <h3>Type: {{ journey.type }}</h3>
            <h3>Passenger Type: {{ journey.passengerType }}</h3>
            <h4>Mode: {{ journey.mode }}</h4>
            <h4>Fare: {{ journey.endingFare }}</h4>
        </div><!-- /#single-journey -->
    
       
    
        <a class="btn btn-outline-primary btn-lg" role="button"><router-link v-bind:to="  '/card/' + journey.card_id + '/journey/'">Back</router-link></a>
      
    </div>
</template>

<script>
    export default {
        
        created() {
            this.fetchJourneyDetail();
            
        },
        
        data() {
            return {
                journey: {},
                id: this.$route.params.id
              
            }
        },
        
        methods: {
            fetchJourneyDetail() {
                this.$http.get('https://blocktrain.test/api/card/' + this.id + '/journey/' + this.journey).then
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