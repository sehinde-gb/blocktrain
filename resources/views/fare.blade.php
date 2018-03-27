<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlockTrain  | New Journey</title>
    <meta id="csrf-token" name="csrf-token" value="{{ csrf_token() }}">
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
                    <h1 class="text-center">Swipe Your Card</h1>
                    <hr />
                    <form method="post" action="/api/journey" @submit.prevent="onSubmit">
                        <div class="row">
                            <div class="col-md-6">
                                <input name="from" v-validate="'required|min:8'" type="text"  class="form-control" placeholder="From.." v-model="from">
                                <p class="help is-danger" v-show="errors.has('from')">
                                    @{{ errors.first('from') }}
                                </p>
                                <span class="city-span">@{{startingCity}}</span>

                            </div>


                            <div class="col-md-6">

                                <input name="to" v-validate="'required|min:8'" type="text" class="form-control" placeholder="To.." v-model="to">
                                <p class="help is-danger" v-show="errors.has('from')">
                                    @{{ errors.first('to') }}
                                </p>
                                <span class="city-span">@{{endingCity}}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Fares" v-model="endingFare" readonly="readonly">
                                <span class="city-span">@{{endingFare}}</span>
                            </div>

                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Description" v-model="description" readonly="readonly">
                                <span class="city-span">@{{description}}</span>
                            </div>
                        </div><!-- /.row -->



                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Passenger Type" v-model="passengerType" readonly="readonly">
                                <span class="city-span">@{{passengerType}}</span>
                            </div>

                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Mode" v-model="mode" readonly="readonly">
                                <span class="city-span">@{{mode}}</span>
                            </div>
                        </div><!-- /.row -->

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Type" v-model="type" readonly="readonly">
                                <span class="city-span">@{{type}}</span>
                            </div>

                            <div class="col-md-6">


                            </div>



                        </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Balance" v-model="current_balance" readonly="readonly">
                                    <span class="city-span">@{{current_balance}}</span>
                                </div>
                            </div>
                            <!-- /.row -->


                        <div class="row">
                            <div class="col-md-12">
                                <a href="/balance"><button :disabled="errors.any()" type="submit" class="btn btn-primary btn-block" id="submit-form">Swipe</button></a>
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
<script src="https://unpkg.com/vee-validate@2.0.0-rc.18/dist/vee-validate.js"></script>


<script>
        Vue.use(VeeValidate);

        var app = new Vue({
            el: '#app',
            data: {
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
                balance: '',
                current_balance: ''

            },

            mounted() {
                var app = this
                const Url = 'https://blocktrain.test/api/cards'

                //app.balance = "Searching.."


                axios.get(Url)
                    .then(function (response){
                        console.log(response)
                        //app.balance = response.data.balance
                    })
                    .catch(function (error){
                        //app.balance = "Invalid Fare"
                    })
            },


            watch: {
                from: function() {
                    this.startingCity = ''
                    if (this.from.length == 8) {
                        this.lookupStartingFrom()
                    }
                },
                to: function() {
                    this.endingCity = ''
                    if (this.to.length == 8) {
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
                    axios.get(TflBaseUrl + app.from)
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
                    axios.get(TflBaseUrl + app.to)
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
                    app.endingFare = "Searching.."


                    axios.get(TflStopUrl + app.startingCity + FareUrl + app.endingCity + AppKey)

                        .then(function (response){
                            app.endingFare = response.data[0].rows[0].ticketsAvailable[0].cost
                            app.description = response.data[0].rows[0].ticketsAvailable[0].description
                            app.passengerType = response.data[0].rows[0].ticketsAvailable[0].passengerType
                            app.mode = response.data[0].rows[0].ticketsAvailable[0].mode
                            app.type= response.data[0].rows[0].ticketsAvailable[0].ticketTime.type
                        })
                        .catch(function (error){
                            app.endingFare = "Invalid Fare"
                        })

                },1000)
            }




        })







    </script>
</html>


