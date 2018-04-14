<template>
    <div>
       
        <div class="container">
            <h1 class="text-center">Swipe In</h1>
            
            
            <form method="post" action="/api/start" @submit.prevent="onSubmit">
                <input name="from" v-validate="'required|min:8'" type="text"  class="form-control" placeholder="Enter your station" v-model="from">
                <p class="help is-danger" v-show="errors.has('from')">
                    {{ errors.first('from') }}
                </p>
                <span class="city-span" v-model="startingCity">{{startingCity}}</span>
                
                <div class="row">
                    <div class="col-md-12">
                       <a href="/end"><button :disabled="errors.any()" type="submit" @click="onSubmit"  class="btn btn-primary btn-block" id="submit-form">Start</button></a>

                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </form>
        </div><!-- /.container -->
    
    </div><!-- /.app -->

</template>

<script>
    var _ = require('lodash');


    export default {
        //props: ['stations'],
        
        data: function() {
            
            return {
                station: [],
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
            }, 500),

            onSubmit: function() {
                this.station.push(this.startingCity);
                this.$http.post('https://blocktrain.test/api/start', this.$data);
                
            }
        }
    }
</script>

<style scoped>
    .container {
        height: 420px;
    }
</style>