<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h1 class="text-center">Start Your Journey</h1>
                        <hr />
                        <h2 class="text-center">Swipe In</h2>
                       
                        
                    <input name="from" v-validate="'required|min:6'" type="text"  class="form-control" placeholder="Enter your station" v-model="from">
                    <p class="help is-danger" v-show="errors.has('from')">
                        {{ errors.first('from') }}
                    </p>
                    <span class="city-span" v-model="startingCity">{{startingCity}}</span>
                    <button v-on:click="stationLeave" :disabled="errors.any()"  class="btn btn-primary btn-block">Swipe In</button>

                    </div><!-- end of .lead-form -->
                </div> <!-- end of .col-md-6.col-md-offset-3 -->
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
                
            
        </div>
        
        
        

    </div>
</template>

<script>
    import {EventBus} from '../app.js';
    
    export default {
        props: ['card.id'],
        
        data: function() {
            return {
              
                from: '',
                startingCity: '',
                fromleave: '',
                firstStations: [],
                card_id: ''
            }
        },

        watch: {
            from: function () {
                this.startingCity = ''
                if (this.from.length == 6) {
                    this.lookupStartingFrom()
                }
            }
        },

        methods: {
            
            stationLeave() {
                
                EventBus.$emit('firststation', this.startingCity)
                //alert('You have swiped in');
            },
            
            lookupStartingFrom: _.debounce(function () {
                var app = this

                const TflBaseUrl = 'https://api.tfl.gov.uk/StopPoint/Search?query='
                app.startingCity = "Searching..."
                this.$http.get(TflBaseUrl + app.from)
                    .then(function (response) {
                        app.startingCity = response.data.matches[0].id
                        //app.startingCity =  response.data.matches[0].name
                    })
                    .catch(function (error) {
                        app.startingCity = "Invalid Station"
                    })
            }, 500)

           
        }
    }
</script>

<style scoped>
    div.card {
        color: #856404;
        border: 4px solid #ffeeba;
    }
</style>