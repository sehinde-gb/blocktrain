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
            <div class="columns medium-3">
                <div class="card">

                    <div class="card-divider">
                        @{{ cards }}
                    </div>

                    <div class="card-divider">
                        @{{ cards.data.current_balance }}
                    </div>
                    <div class="card-divider">
                        @{{ journeys.data.endingFare }}
                    </div>

                    <div class="card-divider">
                        @{{ newBalance }}
                    </div><!-- /.card-divider -->


                </div>
            </div>
        </div> <!-- end of .container -->
    </div><!-- end of #app -->
</body>
<script src="/js/app.js"></script>




<script>

    new Vue({
        el: '#app',
        data: {
            cards: [],
            balance: '',
            journeys: [],
            endingFare: '',
            newBalance: ''
        },
        mounted(){
            axios({
                method: 'get',
                url: '/api/cards'
            })
                .then(response => this.cards = response.data)

        axios({
                  method: 'get',
                  url: '/api/journeys'
              })
        .then(response => this.journeys = response.data)
        }
    });
</script>
</html>




