<template>
    <div>
         <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="lead-form">
                            <form method="post"  @submit.prevent="submitNewJourney">
                                    <hr/>
                                     
                                    <div class="row">
                                        <div class="col-8">
                                            <h1 class="text-center">Approach Barrier</h1>
                                            <hr/>
                                            <h3 class="text-center">Place Card on Reader</h3>
                                            
                                            <hr />
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="" alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                </div>
                                            </div>

                                                           
                                    <hr/>

                                 
                                      
                                        <div class="form group row">
                                            <label for="to">To</label>
                                            <input name="to" v-validate="'required|min:6'" type="text" class="form-control" placeholder="To.." v-model="to" id="to" autocomplete="nope">
                                            <span class="city-span">{{ endingCity}}</span>
                                        </div><!-- /.form group row -->
                                        <br/>
    
                                        
                                        
                                        <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Fares" v-model="endingFare" readonly="readonly" id="endingFare">
                                                <span class="city-span">{{ endingFare}}</span>
                                        </div><!-- /.form group row -->
                                        <br>
                                            <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Description" v-model="description" readonly="readonly">
                                                <span class="city-span">{{ description }}</span>
                                            </div><!-- /.form group row -->
                                            <br/>
                                            <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Passenger Type" v-model="passengerType" readonly="readonly">
                                                <span class="city-span">{{ passengerType}}</span>
                                            </div><!-- /.form group row -->
                                            <br/>
                                            <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Mode" v-model="mode" readonly="readonly">
                                                <span class="city-span">{{ mode}}</span>
                                            </div><!-- /.form group row -->
                                            <br/>
                                            <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Type" v-model="type" readonly="readonly">
                                                <span class="city-span">{{type}}</span>
                                            </div><!-- /.form group row -->
                                            <br/>
                                               <span class="city-span" v-model="startingCity">{{startingCity}}</span>
                                        
                                            <div class="row">
                                               
                                                <button :disabled="errors.any()" type="submit" class="btn btn-primary btn-lg" id="submit" @click.prevent="submitNewJourney">Swipe Out & Exit</button>
                                                
                                                <div class="col-sm"></div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                
                                                <a class="btn btn-light" role="button"><router-link to="/dashboard">Dashboard </router-link></a>
                                                <div class="col-sm"></div>
                                            </div><!-- /.row -->
                                            
                                        </div><!-- /.col-8 -->
                                        
                                    </div><!-- /.row -->
    
                                
                                
                            </form>
                            
                        </div><!-- end of .lead-form -->
                    </div> <!-- end of .col-8 -->
                </div> <!-- end of .row -->
            </div> <!-- end of .container -->
   
    </div>
</template>

<script>

import {EventBus} from '../../app.js';

import _ from 'lodash';


export default {
    
    name: "addJourney",
    
    created() {

         EventBus.$on('firststation', (message) => {
            this.startingCity = message;
             this.from = message;
         })

    },

    data() {
        return {
           
                origin: '',
                startingCity: '',
                to: '',
                endingCity: '',
                fare: '',
                endingFare: '',
                description: '',
                passengerType: '',
                mode: '',
                type: '',
                user_id: this.$route.params.id,
                balance: ''
            
        }
    },
    
    watch: {
        
        
        to: function () {
             this.endingCity = ''
             if (this.to.length == 10) {
                 this.lookupEndingTo(),
                 this.lookupFareTo()
                 //this.lookupStartingFrom()

            }
         }
    },

    methods: {
        // stationEnter() {
        //          EventBus.$emit('firststation', this.startingCity)
        //          alert('You have swiped in');
        //          this.complete = false;
        //     },

       
        lookupStartingFrom: _.debounce(function() {
                var app = this

                const TflBaseUrl = 'https://api.tfl.gov.uk/StopPoint/Search?query='
                app.startingCity = "Searching..."
                this.$http.get(TflBaseUrl + app.origin)
                    .then(function (response) {
                        app.startingCity = response.data.matches[0].id
                        //app.startingCity =  response.data.matches[0].name
                    })
                    .catch(function (error) {
                        app.startingCity = "Invalid Station"
                    })
        }, 500),

        lookupEndingTo: _.throttle(function() {
            var app = this
            const TflBaseUrl = 'https://api.tfl.gov.uk/StopPoint/Search?query='
            app.endingCity = "Searching..."
            this.$http.get(TflBaseUrl + app.to)
                .then(function (response) {
                    app.endingCity = response.data.matches[0].id
                    
                    //app.to = response.data.matches[0].name
                    //app.endingCity = response.data.matches[0].name
                    
                })
                .catch(function (error) {
                    app.endingCity = "Invalid Station"
                })
        }, 500),

        lookupFareTo: _.debounce(function() {
            var app = this

            const TflStopUrl = 'https://api.tfl.gov.uk/Stoppoint/'
            const FareUrl = '/FareTo/'
            const AppKey = '/?app_id=51a876af&app_key=a1c609db4f3994924e7eb19199a08289'
            app.endingFare = "Searching.."

            this.$http.get(TflStopUrl +  app.startingCity + FareUrl + app.endingCity + AppKey)
            
            

                .then(function (response){
                    app.endingFare = response.data[0].rows[0].ticketsAvailable[0].cost,
                    app.description = response.data[0].rows[0].ticketsAvailable[0].description,
                    app.passengerType = response.data[0].rows[0].ticketsAvailable[0].passengerType,
                    app.mode = response.data[0].rows[0].ticketsAvailable[0].mode,
                    app.type = response.data[0].rows[0].ticketsAvailable[0].ticketTime.type,
                    app.origin = response.data[0].rows[0].from,
                    app.startingCity = this.startingCity
                    
                    
                 
                })
                .catch(function (error){
                    app.endingFare = "Invalid Fare"
                })

        },1200),

        onSubmit: function() {
            //this.$http.post('/api/user/' + this.user_id + '/journey', this.$data);
            //alert('Thanks for swiping');
            //this.$router.push('home')

        },

        submitNewJourney() {
             this.$store.dispatch('addJourney', {
                 user_id: this.user_id,
                 origin: this.origin,
                 startingCity: this.startingCity,
                 to: this.to,
                 endingCity: this.endingCity,
                 description: this.description,
                 type: this.type,
                 passengerType: this.passengerType,
                 mode: this.mode,
                 endingFare: this.endingFare

             })   

        }

       

        
    }
   
}
</script>

<style scoped>
    div.card {
        color: #004085;
        border: 4px solid #b8daff;
    }
    
    .container {
        height: 420px;
    }
</style>

