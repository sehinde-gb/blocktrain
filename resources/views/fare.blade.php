<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlockTrain  | New Journey</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="lead-form">
                    <h1 class="text-center">Fill Out This Form</h1>
                    <hr />
                    <form method="post" action="/api/journey" @submit.prevent="onSubmit">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="From.." v-model="startingFrom" required>
                                <span class="city-span">@{{startingCity}}</span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="To.." v-model="endingTo" required>
                                <span class="city-span">@{{endingCity}}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Fares" v-model="fare" required>
                                <span class="city-span">@{{endingFare}}</span>
                            </div>
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" id="submit-form">Submit</button>
                            </div>
                        </div>
                </form>
                </div><!-- end of .lead-form -->
            </div> <!-- end of .col-md-6.col-md-offset-3 -->
        </div> <!-- end of .row -->
    </div> <!-- end of .container -->
</div> <!-- end of #app -->
</body>

<script src="https://unpkg.com/vue@2.0.3/dist/vue.js"></script>
<script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
<script src="https://unpkg.com/lodash@4.13.1/lodash.min.js"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            startingFrom: '',
            startingCity: '',
            endingTo: '',
            endingCity: '',
            fare: '',
            endingFare: ''
        },
        watch: {
            startingFrom: function() {
                this.startingCity = ''
                if (this.startingFrom.length == 8) {
                    this.lookupStartingFrom()
                }
            },
            endingTo: function() {
                this.endingCity = ''
                if (this.endingTo.length == 8) {
                    this.lookupEndingTo()
                    this.lookupFareTo()
                }
            }


        },
        methods: {
            lookupStartingFrom: _.debounce(function() {
                var app = this
                const TflBaseUrl = 'https://api.tfl.gov.uk/StopPoint/Search?query='
                app.startingCity = "Searching..."
                axios.get(TflBaseUrl + app.startingFrom)
                    .then(function (response) {
                        app.startingCity = response.data.matches[0].id
                        //app.startingCity =  response.data.matches[0].name
                    })
                    .catch(function (error) {
                        app.startingCity = "Invalid Station"
                    })
            }, 500),
            lookupEndingTo: _.debounce(function() {
                var app = this
                const TflBaseUrl = 'https://api.tfl.gov.uk/StopPoint/Search?query='
                app.endingCity = "Searching..."
                axios.get(TflBaseUrl + app.endingTo)
                    .then(function (response) {
                        app.endingCity = response.data.matches[0].id
                        //app.endingCity = response.data.matches[0].name
                    })
                    .catch(function (error) {
                        app.endingCity = "Invalid Station"
                    })
            }, 500),

            onSubmit: function() {

                axios.post('https://blocktrain.test/api/journey', this.$data);

             },

            lookupFareTo: _.debounce(function() {
                var app = this
                const TflStopUrl = 'https://api.tfl.gov.uk/Stoppoint/'
                const FareUrl = '/FareTo/'
                const AppKey = '/?app_id=51a876af&app_key=a1c609db4f3994924e7eb19199a08289'
                app.fare = "Searching.."


                axios.get(TflStopUrl + app.startingCity + FareUrl + app.endingCity + AppKey)

                    .then(function (response){
                        app.fare = response.data[0].rows[0].ticketsAvailable[0].cost
                    })
                    .catch(function (error){
                        app.endingFare = "Invalid Fare"
                    })

            },1000)
        }


    })
</script>
</html>


