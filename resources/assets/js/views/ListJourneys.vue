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
                journeys: []
            }

        },
        methods: {
            fetchJourneyList() {
                var id = this.$route.params.id;
                this.$http.get('api/cards/' + id + '/journeys').then((response) => {
                    console.log(response.data.data);
                    //this.journeys = response.data.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>