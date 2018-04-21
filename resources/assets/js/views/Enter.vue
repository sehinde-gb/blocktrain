<template>
    <div>
        <div class="card m-3" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title" v-text="thecardtitle"></h5>
                <p class="card-text">I am the  <b>enter component</b>.</p>
                <button @click="messageLeave" class="btn btn-warning">Message Leave</button>
                <div v-if="messageenter" class="mt-3 alert alert-secondary" v-html="messageenter"></div>

            </div>
        </div>
        
        
        <div class="col-4">
            <h1 class="text-center">Swipe In</h1>
            <input name="from" v-validate="'required|min:8'" type="text"  class="form-control" placeholder="Enter your station" v-model="from">
            <p class="help is-danger" v-show="errors.has('from')">
                {{ errors.first('from') }}
            </p>
            <span class="city-span" v-model="startingCity">{{startingCity}}</span>
            <button v-on:click="addStation" :disabled="errors.any()"  class="btn btn-primary btn-block">Swipe In</button>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['messageenter'],
        
        data: function() {
            return {
                from: '',
                startingCity: '',
                thecardtitle: 'Child Component!'
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
            addStation() {
                this.startStation.push(this.startingCity);
                alert('You have swiped in');
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
            }, 500),

            messageLeave() {
                this.$emit('entersaid', 'Swipe said do your homework!')
            }
        }
    }
</script>

<style scoped>
    div.card {
        color: #856404;
        border: 4px solid #ffeeba;
    }
</style>