<template>
    <div>
         <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="lead-form">
                            <form method="post"  @submit.prevent="onSubmit">
                                    <hr/>
                                    
                                    <span class="city-span">{{ startingCity }}</span>
                                   
        
                                    <div class="row">
                                        <div class="col-8">
                                            <h1 class="text-center">Approach Barrier</h1>
                                            <hr/>
                                            <h3 class="text-center">Place Card on Reader</h3>
                                            
                                            <hr />
                                            <div class="card bg-dark text-white">
                                                <img class="card-img"  alt="Card image">
                                                <div class="card-img-overlay">
                                                    <h5 class="card-title">Swipe Out</h5>
                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <p class="card-text">Last updated 3 mins ago</p>
                                                </div>
                                            </div>
                                            
                                        
                                        <div class="form group row">
                                            <label for="to">To</label>
                                            <input name="to" v-validate="'required|min:6'" type="text" class="form-control" placeholder="To.." v-model="to" id="to" autocomplete="nope">
                                            <span class="city-span">{{endingCity}}</span>
                                        </div><!-- /.form group row -->
                                        <br/>
                                        
                                        <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Fares" v-model="endingFare" readonly="readonly" id="endingFare">
                                                <span class="city-span">{{endingFare}}</span>
                                        </div><!-- /.form group row -->
                                        <br>
                                            <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Description" v-model="description" readonly="readonly">
                                                <span class="city-span">{{description}}</span>
                                            </div><!-- /.form group row -->
                                            <br/>
                                            <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Passenger Type" v-model="passengerType" readonly="readonly">
                                                <span class="city-span">{{passengerType}}</span>
                                            </div><!-- /.form group row -->
                                            <br/>
                                            <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Mode" v-model="mode" readonly="readonly">
                                                <span class="city-span">{{mode}}</span>
                                            </div><!-- /.form group row -->
                                            <br/>
                                            <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Type" v-model="type" readonly="readonly">
                                                <span class="city-span">{{type}}</span>
                                            </div><!-- /.form group row -->
                                            <br/>
                                            <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Balance" v-model="balance" readonly="readonly">
    
                                                <span class="city-span">{{formattedCost}}</span>
                                                <span class="city-span">{{ balance }}</span>
                                            </div><!-- /.form group row -->
                                            <br/>
                                            <div class="row">
                                                <div class="col-sm"></div>
                                                <button :disabled="errors.any()" type="submit" class="btn btn-primary btn-lg" id="submit" value="swipe">Exit</button>
                                                
                                                <div class="col-sm"></div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-sm"></div>
                                                
                                                <a class="btn btn-light" role="button"><router-link to="/users">Users </router-link></a>
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
import { swipe } from '../../helpers/auth';
import _ from 'lodash';


export default {
    
    name: "swipe",
    
    created() {

        EventBus.$on('firststation', (message) => {
            this.startingCity = message;
            this.from = message;
        })

    },

    data() {
        return {
                from: '',
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
                user_id: this.$route.params.id
        }
    },
    computed: {
        formattedCost () {
            return this.balance - this.endingFare;
        },
        swipeError() {
            return this.$store.getters.swipeError;
        }
    },
    watch: {
        to: function () {
            this.endingCity = ''
            if (this.to.length == 6) {
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
                })
                .catch(function (error) {
                    app.endingCity = "Invalid Station"
                })
        }, 600),

        lookupFareTo: _.debounce(function() {
            var app = this

            const TflStopUrl = 'https://api.tfl.gov.uk/Stoppoint/'
            const FareUrl = '/FareTo/'
            const AppKey = '/?app_id=51a876af&app_key=a1c609db4f3994924e7eb19199a08289'
            app.endingFare = "Searching.."


            this.$http.get(TflStopUrl +  app.startingCity + FareUrl + app.endingCity + AppKey)

                .then(function (response){
                    app.endingFare = response.data[0].rows[0].ticketsAvailable[0].cost
                    app.description = response.data[0].rows[0].ticketsAvailable[0].description
                    app.passengerType = response.data[0].rows[0].ticketsAvailable[0].passengerType
                    app.mode = response.data[0].rows[0].ticketsAvailable[0].mode
                    app.type = response.data[0].rows[0].ticketsAvailable[0].ticketTime.type
                    app.from = response.data[0].rows[0].from
                    
                

                })
                .catch(function (error){
                    app.endingFare = "Invalid Fare"
                })

        },1200),

        onSubmit: function() {
            this.$http.post('/api/user/' + this.user_id + '/journey', this.$data);
            alert('Thanks for swiping');
            this.$router.push('dashboard')

        },

        upload() {
            this.$store.dispatch('swipe');
            swipe(this.$data.form)
                .then((res) => {
                    this.$store.commit("swipeSuccess", res);
                    this.$router.push({ path: '/users'});
                   
                    
                })
                .catch((error) => {
                    this.$store.commit('swipeFailed', {error});
                });
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

