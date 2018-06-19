<template>
    <div>
        <div class="test" v-show="complete">
            <div class="container">
                <div class="row">
                        <div class="col-8">
                            <div class="lead-form">
                                <h1 class="text-center">Enter Station</h1>
                                <hr/>
                                <h2 class="text-center">Place Card on Reader</h2>
                                <hr />
                                <div class="card bg-dark text-white">
                                    <img class="card-img" src="" alt="Card image">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title">Swipe Out</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text">Last updated 3 mins ago</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                    <label for="from">From</label>
                                    <input name="from" v-validate="'required|min:6'" type="text"  class="form-control" placeholder="Enter your station" v-model="from" id="from">
                                    <p class="help is-danger" v-show="errors.has('from')">
                                        {{ errors.first('from') }}
                                    </p>
                                    <span class="city-span" v-model="startingCity">{{startingCity}}</span>
                                    <hr/>
                                </div><!-- /.form-group -->
                            
                            <div class="row">
                                <div class="col-sm"></div>
                                <div class="col-sm"><button v-on:click="stationLeave" :disabled="errors.any()"  class="btn btn-primary btn-lg">Enter</button></div>
                                <div class="col-sm"></div>
                            </div><!-- /.row -->
                        </div><!-- end of .lead-form -->
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
        props: ['user.id'],
        
        data: function() {
            return {
                from: '',
                startingCity: '',
                fromleave: '',
                firstStations: [],
                user_id: '',
                complete: true
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
                alert('You have swiped in');
                this.complete = false;
                
                
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