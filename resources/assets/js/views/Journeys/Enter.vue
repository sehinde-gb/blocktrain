<template>
    <div>
        <div class="test" v-show="complete">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="lead-form">
                            <h1 class="text-center">New Journey</h1>
                            <hr/>
                            <h4 class="text-center">Enter Origin Station</h4>
                            <hr />
                            
                            
                        </div><!-- end of .lead-form -->
                            <br>
                            <div class="form-group">
                               
                                <input name="from" v-validate="'required|min:6'" type="text"  class="form-control" placeholder="Origin Station (Min. 6 characters)" v-model="from" id="from">
                                <p class="help is-danger" v-show="errors.has('from')">
                                    {{ errors.first('from') }}
                                </p><!-- help is danger -->
                                

                                
                                <span class="city-span" v-model="startingCity">{{startingCity}}</span>
                                <hr/>
                            </div><!-- /.form-group -->
                        
                       
                        <div class="row">
                            
                            <div class="col-sm"><button @click.prevent="stationEnter" :disabled="errors.any()"  class="btn btn-primary btn-lg">Enter</button></div>
                            <div class="col-sm"></div><!-- .col-sm -->
                        </div><!-- /.row -->
                    
                    </div> <!-- end of .col-8 -->
                        
                         <SideMenu></SideMenu>

                </div> <!-- end of .row -->
            </div> <!-- end of .container -->

        </div><!-- end of .test -->
    
    </div>
</template>

<script>
import {EventBus} from '../../app.js';
import SideMenu from '../Users/SideMenu.vue';

export default {
    
    name: 'enter',

    components: {SideMenu},
    
    
    data: function() {
        return {
            from: '',
            startingCity: '',
            firstStations: [],
            user_id: this.$route.params.id,
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
    computed: {
        
        users() {
                return this.$store.getters.getUsers;
        },

        

        isComplete () {
            return this.from && this.startingCity;
               
        },
    },    

    methods: {
            
        stationEnter() {
                EventBus.$emit('firststation', this.startingCity)
                //alert('You have swiped in');
                this.complete = false;
                //this.$router.push('/');      
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

        
    },
    submitNewJourney() {
             this.$store.dispatch('addJourney', {
                 user_id: this.user_id,
                 from: this.from,
                 startingCity: this.startingCity
                 
                
            })
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