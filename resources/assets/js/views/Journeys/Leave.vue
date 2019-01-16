<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="wrap" v-show="complete">    
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
                                            </div><!-- /.card-body -->
                                        </div><!-- /.card -->               
                                        <hr/>
                                        <div class="form group row">
                                            <label for="to">To</label>
                                            <input name="to" v-validate="'required|min:6'" type="text" class="form-control" placeholder="Destination Station (Min. 6 Characters)" v-model="to" id="to" autocomplete="nope">
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

                                        <br/>
                                            <span class="city-span" v-model="startingCity">{{startingCity}}</span>
                                    
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6>Step 2: Leave The Station</h6>
                                                    
                                                    <button type="submit" :disabled='!isComplete'   class="btn btn-primary btn-lg" id="submit"  @click.prevent="submitNewJourney" >Leave</button>
                                                        
                                                </div><!-- /.col-8 -->
                                            </div><!-- /.row -->
                                        <br>

                                        

                                      
                                            <div class="row" v-if="shine">
                                                <div class="col-6">
                                                    <h6>Step 3: Add To BlockChain</h6>
                                                    <button class="btn btn-primary" :disabled="disableSubmit" @click="performSubmit">BlockChain</button>
                                                    <strong v-show="submitting">Submitting...</strong>
                                                    <strong v-show="errorSubmit" class="text-danger">Error occurred!</strong>

                                                    <p v-show="successMessage" class="text-success">
                                                        <strong>You've been registered!</strong>
                                                        <br>
                                                        You will be redirected to the confirmation page <strong>once the block will be mined!</strong>
                                                    </p>
                                                </div><!-- /.col-6 -->                                
                                            </div><!-- /.row --> 

                                          
                                    </div><!-- /.col-8 -->
                                        
                                </div><!-- /.row -->     
                            </form>
                                
                        </div><!-- end of .lead-form -->
                    </div><!-- end of .wrap -->
                </div><!-- end of .col-8 -->
            </div> <!-- end of .row -->
        </div><!-- end of .container -->
                        
               
    </div>
</template>

<script>

import {EventBus} from '../../app.js';
// importing common function
import mixin from '../../../../../libs/mixinViews';
import _ from 'lodash';



export default {
     
     
    mixins: [mixin],


    name: "addJourney",
    
    created() {

         EventBus.$on('firststation', (message) => {
            this.startingCity = message;
            this.from = message;
            this.complete = message;
            this.finished = message;
             
        }),

          // it checks every 500ms if the journey is registered until the connection is established
            this.redirectIfJourneyRegistered()

    },

    data() {
        return {
                user_id: this.$route.params.id,
                from: '',
                startingCity: '',
                to: '',
                endingCity: '',
                description: '',
                type: '',
                passengerType: '',
                complete: '',
                isShown: false,
                mode: '',
                endingFare: '',
                submitting: false, // true once the submit button is pressed
                successMessage: false, // true when the journey has been registered successfully
                tmoConn: null, // contain the intervalID given by setInterval
                tmoReg: null, // contain the intervalID given by setInterval
                errorSubmit: false,
                display: false,
                shine: false
                
              
        }
    },

    computed: {
        
        users() {
                return this.$store.getters.getUsers;
        },

        /**
         * It disables the submit button if the fields are not filled
         * or the submit button is pressed or the connection with the blockchain is
         * not established.
         */
        disableSubmit() {
            return (!this.from.length || !this.startingCity.length || !this.to.length || this.submitting || !this.blockchainIsConnected())
        },

        isComplete () {
            return this.to && this.endingCity && this.description;
        }
               
    },
    
    watch: {
                
        to: function () {
             this.endingCity = ''
             if (this.to.length == 6) {
                 this.lookupEndingTo(),
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
                    //app.to = response.data.matches[0].name              
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
            
                .then(function (response) {
                    app.from = response.data[0].rows[0].from,
                    //app.to = response.data[0].rows[0].to,
                    app.endingCity = response.data[0].rows[0].toStation,
                    app.startingCity = this.startingCity,
                    app.description = response.data[0].rows[0].ticketsAvailable[0].description,
                    app.type = response.data[0].rows[0].ticketsAvailable[0].ticketTime.type,
                    app.passengerType = response.data[0].rows[0].ticketsAvailable[0].passengerType,
                    app.endingFare = response.data[0].rows[0].ticketsAvailable[0].cost,
                    app.mode = response.data[0].rows[0].ticketsAvailable[0].mode,
                    app.endingFare = this.endingFare * 100
                    
                })
                .catch(function (error){
                    app.endingFare = "Invalid Fare"
                })
        },1200),

            

        /**
         * Perform the registration of the journey when the submit button is pressed.
         */
        performSubmit() {
            this.submitting = true
            this.errorSubmit = false
            this.successMessage = false

            // calling the function registerJourney of the smart contract
            window.bc.contract().registerJourney(
                this.from,
                this.to,
                this.endingFare,
                {
                    from: window.bc.web3().eth.coinbase,
                    gas: 800000
                },
                (err, txHash) => {
                    if (err) {
                        console.error(err)
                        this.errorSubmit = true
                    }
                    else {
                        this.successMessage = true

                        // it emits a global event in order to update the top menu bar
                        Event.$emit('journeyregistered', txHash);

                        // the transaction was submitted and the journey will be redirected to the
                        // confirmation page once the block will be mined
                        //this.redirectWhenBlockMined()
                    }
                }
            )
        },

        /**
        * Check to see if the journey has been registered and if it has then
        * you will be redirected to the confirmation page.
        */
        redirectIfJourneyRegistered() {
            this.tmoConn = setInterval(() => {
                // checking first the connection
                if (this.blockchainIsConnected()) {
                    // stopping the interval
                    clearInterval(this.tmoConn)

                    // calling the smart contract
                    window.bc.contract().isRegistered.call((error, res) => {
                        if (res) {
                            // redirecting to the confirmation page
                            alert('You are on the BlockTrain');
        
                            //this.$router.replace({ path: '/confirmation' })
                        }
                    })
                }
            }, 500)
        },

        submitNewJourney() {
             this.$store.dispatch('addJourney', {
                 user_id: this.user_id,
                 from: this.from,
                 startingCity: this.startingCity,
                 to: this.to,
                 endingCity: this.endingCity,
                 description: this.description,
                 type: this.type,
                 passengerType: this.passengerType,
                 mode: this.mode,
                 endingFare: this.endingFare,
                 complete: false,
                 finished: true,
                 shine: true
                
            })
        },     

        /**
         * Once the journey submitted this funciton checks every 1000 ms to see if
         * if the journey registration to the blockchain is successful. 
         * Once the journey has been registered you will be redirected to the
         * confirmation page.
         *
         * NOTE: in order to check if the user has been registered successfully the
         * function has to check several time because the block can take several
         * minutes to be mined (depending on the configuration of the blockchain you
         * are using).
         */
        redirectWhenBlockMined() {
            this.tmoReg = setInterval(() => {
                if (this.blockchainIsConnected()) {
                    window.bc.contract().isRegistered.call((error, res) => {
                        if (error) {
                            console.error(error)
                        }
                        else if (res) {
                            // stopping the setInterval
                            clearInterval(this.tmoReg)                            
                            //this.$router.replace({ path: '/confirmation' })
                        }
                    })
                }
            }, 1000)
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

