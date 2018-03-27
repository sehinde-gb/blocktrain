<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="lead-form">
                    <h1 class="text-center">Swipe Your Card</h1>
                    <hr />
                    <form method="post" action="/api/journey" @submit.prevent="onSubmit">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="From.." v-model="startingFrom" required>
                                <span class="city-span">{{startingCity}}</span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="To.." v-model="endingTo" required>
                                <span class="city-span">{{endingCity}}</span>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Fares" v-model="endingFare" required>
                                <span class="city-span">{{endingFare}}</span>
                            </div>
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" id="submit-form">Submit</button>
                            </div>
                        </div>
    
                       
                    </form>
                </div><!-- end of .lead-form -->
            </div> <!-- end of .col-md-6.col-md-offset-3 -->
        </div> <!-- end of .row -->
    </div> <!-- end of .container -->
    </div> <!-- end of #app -->
</template>

<script>
    
    import axios from 'axios';
    import _ from 'lodash';
   

    export default {
        data: function () {
            return {
                startingFrom: '',
                startingCity: '',
                endingTo: '',
                endingCity: '',
                fare: '',
                endingFare: ''
            }
        },
        watch: {
            startingFrom: function() {
                this.startingCity = ''
                if (this.startingFrom.length == 8) {
                    this.lookupStartingFrom()
                }
            },
            endingTo: function() {
                this.endingCity = ''
                if (this.endingTo.length == 8) {
                    this.lookupEndingTo()
                    this.lookupFareTo()
                }
            }


        },
        methods: {
            lookupStartingFrom: _.debounce(function() {
                var app = this
                const TflBaseUrl = 'https://api.tfl.gov.uk/StopPoint/Search?query='
                app.startingCity = "Searching..."
               
                axios.get(TflBaseUrl + app.startingFrom)
                    .then(function (response) {
                        console.log(response)
                        //app.startingCity = response.data.matches[0].id
                        //app.startingCity =  response.data.matches[0].name
                    })
                    .catch(function (error) {
                        app.startingCity = "Invalid Station"
                    })
            }, 500),
            lookupEndingTo: _.debounce(function() {
                var app = this
                const TflBaseUrl = 'https://api.tfl.gov.uk/StopPoint/Search?query='
                app.endingCity = "Searching..."
                axios.get(TflBaseUrl + app.endingTo)
                    .then(function (response) {
                        app.endingCity = response.data.matches[0].id
                        //app.endingCity = response.data.matches[0].name
                    })
                    .catch(function (error) {
                        app.endingCity = "Invalid Station"
                    })
            }, 500),

            onSubmit: function() {

                axios.post('https://blocktrain.test/api/journey', this.$data);

            },

            lookupFareTo: _.debounce(function() {
                var app = this
                const TflStopUrl = 'https://api.tfl.gov.uk/Stoppoint/'
                const FareUrl = '/FareTo/'
                const AppKey = '/?app_id=51a876af&app_key=a1c609db4f3994924e7eb19199a08289'
                app.endingFare = "Searching.."


                axios.get(TflStopUrl + app.startingCity + FareUrl + app.endingCity + AppKey)

                    .then(function (response){
                        app.endingFare = response.data[0].rows[0].ticketsAvailable[0].cost
                    })
                    .catch(function (error){
                        app.endingFare = "Invalid Fare"
                    })

            },1000)
        }


    }
</script>

<style scoped>

</style>