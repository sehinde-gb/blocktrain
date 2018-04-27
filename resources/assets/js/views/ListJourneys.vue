<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h2 class="text-center">Journey Listings</h2>
                        <div v-for="journey in journeys" class="single-card">
                            <router-link v-bind:to="'/journeys/' + journey.id"><h4>Id: {{ journey.id }}</h4></router-link>
                        </div>
    
                        <h2 class="text-center">Card Listings</h2>
                        <div v-for="card in cards" class="single-card">
                            {{ card }}
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
            this.fetchCardList();
        },

        data() {
            return {
                journeys: [],
                cards: []
            }

        },
        methods: {
            fetchJourneyList() {
                this.$http.get('api/journeys').then((response) => {
                    console.log(response.data.data);
                    //this.journeys = response.data.data;
                });
                
            },
            fetchCardList() {
                this.$http.get('api/cards').then((response) => {
                    console.log(response.data.data);
                    //this.cards = response.data.data;
                });

            },
            
        }
    }
</script>

<style scoped>

</style>