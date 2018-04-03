/* Parent */

<template>
    <div id="app">
         <div class="container">
            <h1 class="text-center">Checkin: Swipe your card</h1>
            <input name="from" v-validate="'required|min:8'" type="text"  class="form-control" placeholder="From.." v-model="from">
            <p class="help is-danger" v-show="errors.has('from')">
                {{ errors.first('from') }}
            </p>
            <span class="city-span">{{startingCity}}</span>
        </div><!-- /.container -->
       
    </div><!-- /.app -->

</template>

<script>
    var _ = require('lodash');
    
    export default {
        from: "CheckIn",
        
        props: {
            from: {
                type: String,
            }
           
            
        },
        
        data: function() {
            return {
             
                from: '',
                startingCity: '',
               
                
            }

        },

        watch: {
            from: function () {
                this.startingCity = ''
                if (this.from.length == 8) {
                    this.lookupStartingFrom()
                }
            }
        },
        components: {
            //Journey,
        },
        methods: {
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

</style>