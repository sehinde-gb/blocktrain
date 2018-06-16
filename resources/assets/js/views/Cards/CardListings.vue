<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h2 class="text-center">Card Listings</h2>
                      
                            <div v-for="card in cards" class="single-card">
                             
                             <ul class="list-group">
                             
                                 <router-link class="list-group-item active" v-bind:to="  '/card/' + card.id"><h4>Card {{ card.id }}: Show Details  </h4></router-link>
    
                                 <router-link class="list-group-item" v-bind:to="  '/card/' + card.id + '/create/journey'"><h4>Card {{ card.id }}: Start</h4></router-link>
    
                                 <router-link class="list-group-item" v-bind:to="  '/card/' + card.id + '/journeys'"><h4>Card {{ card.id }} View Journeys</h4></router-link>

                             </ul>
                             
                             
                                
                            </div>
                    </div>
                </div> <!-- end of .col-md-6.col-md-offset-3 -->
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
    </div>
</template>

<script>

    import axios from 'axios';

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
                axios.get('/api/card').then((response) => {
                    //console.log(response.data);
                    this.cards = response.data;
                });
            }
        }
    }
</script>