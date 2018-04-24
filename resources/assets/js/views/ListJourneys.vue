<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h2 class="text-center">Journey History</h2>
                        <ul>
                            <li v-for="journey in journeys" v-text="journey">
                            
                            </li>
                        </ul>
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

        methods: {
            fetchJourneyList() {
                this.$http.get('api/journeys').then((response) => {
                    this.list = response.data;
                });
            },


            data() {
                return {
                    journeys: []
                    //journeys: ['Stratford', 'Canons Park', 'Harrow on the Hill', 'North Harrow']
                }

            }
        }
    }
</script>

<style scoped>

</style>