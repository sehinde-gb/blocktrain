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
                        </div>

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
            startingCity: ''


        },

        watch: {
            from: function() {
                this.startingCity = ''
                if (this.from.length == 8) {
                    this.lookupStartingFrom()
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

            onSubmit: function() {

                axios.post('https://blocktrain.test/api/journey', this.$data);
            }


        }




    });







</script>
</html>

