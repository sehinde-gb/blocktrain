<template>
    <div>
        <div class="test" v-show="complete">
            <div class="container">
                <div class="row">
                        <div class="col-8">
                            <div class="lead-form">
                                <h1 class="text-center">Enter Station</h1>
                                <hr/>
                                <h4 class="text-center">Place Card on Reader</h4>
                                <hr />
                               
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div><!-- end of .lead-form -->
                                <br>
                                <div class="form-group">
                                   <label for="origin">Origin</label>
                                    <input name="origin" v-validate="'required|min:6'" type="text"  class="form-control" placeholder="Enter your station" v-model="origin" id="origin">
                                    <p class="help is-danger" v-show="errors.has('origin')">
                                        {{ errors.first('origin') }}
                                    </p>
                                    <p></p>

                                    
                                    <span class="city-span" v-model="startingCity">{{startingCity}}</span>
                                    <hr/>
                                </div><!-- /.form-group -->
                            
                            <div class="row">
                                <div class="col-sm"><button @click.prevent="stationEnter" :disabled="errors.any()"  class="btn btn-primary btn-lg">Add Journey</button></div>
                                <div class="col-sm"></div>
                            </div><!-- /.row -->
                      
                    </div> <!-- end of .col-8 -->
                    <div class="col-4">
                        <h2>My Account</h2>
                        <ul>
                            <a href="#">Contactless</a>
        
                        </ul>
    
                    </div><!-- end of .col-4 -->
                </div> <!-- end of .row -->
            </div> <!-- end of .container -->

        </div><!-- end of .test -->
    
    </div>
</template>

<script>
    import {EventBus} from '../../app.js';
    
    export default {
        name: 'enter',

        props: ['user.id'],
        
        data: function() {
            return {
                origin: '',
                startingCity: '',
                firstStations: [],
                user_id: '',
                complete: true
                             
            }
        },
        

        watch: {
            origin: function () {
                this.startingCity = ''
                if (this.origin.length == 10) {
                    this.lookupStartingFrom()
                }
            }
        },
        

        methods: {
             
            stationEnter() {
                 EventBus.$emit('firststation', this.startingCity)
                 alert('You have swiped in');
                 this.complete = false;
            },
            
            lookupStartingFrom: _.throttle(function () {
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
            }, 500)

           
        }
    }
</script>

<style scoped>
    div.card {
        color: #856404;
        border: 4px solid #ffeeba;
    }
    
    .help  {
        color: red;
    }
    
    .is-danger {
        color: red;
    }
    
    
</style>