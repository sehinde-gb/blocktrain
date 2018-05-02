<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h2 class="text-center">Card Listings</h2>
                      
                            <div v-for="card in cards" class="single-card">
                             
                                <router-link v-bind:to="  '/card/' + card.id"><h4>Card Number: {{ card.id }} </h4></router-link>
                            </div>
                    </div>
                </div> <!-- end of .col-md-6.col-md-offset-3 -->
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
    </div>
</template>

<script>
    export default {
      
        created() {
            this.fetchCardList();
        },

        data() {
            return {
                cards: [],
                id: ''
            }
        },
        methods: {

            fetchCardList() {
                this.$http.get('https://blocktrain.test/api/card').then((response) => {
                    //console.log(response.data);
                    this.cards = response.data;
                });
            }
        }
    }
</script>