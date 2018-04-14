<template>
    <div id="app">
        
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h1 class="text-center">Swipe Out</h1>
                        <hr />
                        <form method="post" action="/api/end" @submit.prevent="onSubmit">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <span class="city-span" v-model="startingCity">{{ station.startingCity }}</span>
                                    
                                </div><!-- /.col-md-6 -->
                                
                                
                                <div class="col-md-6">
                                    <input name="to" v-validate="'required|min:8'" type="text" class="form-control" placeholder="To.." v-model="to">
                                    <p class="help is-danger" v-show="errors.has('from')">
                                        {{ errors.first('to') }}
                                    </p>
                                    <span class="city-span">{{endingCity}}</span>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Fares" v-model="endingFare" readonly="readonly">
                                    <span class="city-span">{{endingFare}}</span>
                                </div><!-- /.col-md-6 -->
                                
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Description" v-model="description" readonly="readonly">
                                    <span class="city-span">{{description}}</span>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Passenger Type" v-model="passengerType" readonly="readonly">
                                    <span class="city-span">{{passengerType}}</span>
                                </div><!-- /.col-md-6 -->
                                
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Mode" v-model="mode" readonly="readonly">
                                    <span class="city-span">{{mode}}</span>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Type" v-model="type" readonly="readonly">
                                    <span class="city-span">{{type}}</span>
                                </div><!-- /.col-md-6 -->
                                
                                <div class="col-md-6"></div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Balance" v-model="current_balance" readonly="readonly">
                                    
                                    <span class="city-span">{{formattedCost}}</span>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/balance"><button :disabled="errors.any()" type="submit" class="btn btn-primary btn-block" id="submit-form">Next</button></a>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </form>
                    </div><!-- end of .lead-form -->
                </div> <!-- end of .col-md-6.col-md-offset-3 -->
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
    </div> <!-- end of #app -->

</template>

<script>
    import _ from 'lodash';


    export default {
        props: ['station'],
        
        data: function() {
            return {
                //from: '',
                startingCity: '',
                to: '',
                endingCity: '',
                fare: '',
                endingFare: '',
                description: '',
                passengerType: '',
                mode: '',
                type: '',
                balance: '100',
                current_balance: ''

            }

        },



        computed: {
            formattedCost () {
                return this.balance - this.endingFare;
            }
        },


        watch: {
           
            to: function() {
                this.endingCity = ''
                if (this.to.length == 8) {
                    this.lookupEndingTo()
                    this.lookupFareTo()
                }
            }

        },
        methods: {
            
            
            
            
            lookupEndingTo: _.debounce(function() {
                var app = this
                const TflBaseUrl = 'https://api.tfl.gov.uk/StopPoint/Search?query='
                app.endingCity = "Searching..."
                this.$http.get(TflBaseUrl + app.to)
                    .then(function (response) {

                        app.endingCity = response.data.matches[0].id
                        //app.endingCity = response.data.matches[0].name
                        app.startingCity = this.station.startingCity
                    })
                    .catch(function (error) {
                        app.endingCity = "Invalid Station"
                    })
            }, 500),

            onSubmit: function() {

                this.$http.post('https://blocktrain.test/api/end', this.$data);

            },

           


            lookupFareTo: _.debounce(function() {
                var app = this
                const TflStopUrl = 'https://api.tfl.gov.uk/Stoppoint/'
                const FareUrl = '/FareTo/'
                const AppKey = '/?app_id=51a876af&app_key=a1c609db4f3994924e7eb19199a08289'
                app.endingFare = "Searching.."
                
                
             

                this.$http.get(TflStopUrl + app.startingCity + FareUrl + app.endingCity + AppKey)

                    .then(function (response){
                        app.endingFare = response.data[0].rows[0].ticketsAvailable[0].cost
                        app.description = response.data[0].rows[0].ticketsAvailable[0].description
                        app.passengerType = response.data[0].rows[0].ticketsAvailable[0].passengerType
                        app.mode = response.data[0].rows[0].ticketsAvailable[0].mode
                        app.type= response.data[0].rows[0].ticketsAvailable[0].ticketTime.type
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