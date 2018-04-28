j<template>
    <div>
        <div id="single-journey">
                <h2>Your Journey </h2>
            <h1>Card: {{ card }}</h1>
            <h3>From: {{ journey.from }}</h3>
            <h3>Destination: {{ journey.to }}</h3>
            <h3>Description: {{ journey.description }}</h3>
            <h3>Type: {{ journey.type }}</h3>
            <h3>Passenger Type: {{ journey.passengerType }}</h3>
            <h4>Mode: {{ journey.mode }}</h4>
            <h4>Fare: {{ journey.endingFare }}</h4>
        </div><!-- /#single-journey -->
    
    </div>
</template>

<script>
    export default {
        props: ['card'],
        
        data() {
            return {
                
                journey: {}
            }
        },
        created() {
            this.$http.get('https://blocktrain.test/api/journeys/' + this.id).then((response) => {
                //console.log(response);
                this.journey = response.body;
            });
        },

        filters: {
            toUpperCase(value) {
                return value.toUpperCase();
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