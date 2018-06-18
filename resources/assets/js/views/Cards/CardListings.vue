<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <h2 class="text-center">My Zorra Cards</h2>
                            <hr/>
                            <div v-for="card in cards" class="single-card">
                                 <ul class="list-group">
                                    <h5>Card Management</h5>
                                    Card Number:  {{ card.id }}
                                    <br>
                                    Balance: {{ card.balance }}
                                     <router-link class="list-group-item" v-bind:to="  '/cards/' + card.id"><h6> View / Change Card  </h6></router-link>
                                     <router-link class="list-group-item" to="/cards/register">New Card</router-link>
                                     
                                     <hr/>
                                     <h5>Journeys</h5>
                                     <router-link class="list-group-item" v-bind:to="  '/cards/' + card.id + '/create/journey'"><h6>Start Journey</h6></router-link>
                                     
                                   
                                     
                                     <router-link class="list-group-item" v-bind:to="  '/cards/' + card.id + '/journeys'"><h6>Journey History</h6></router-link>
                                 </ul>
                            </div><!-- .single-card -->
                    </div><!-- .lead-form -->
                </div> <!-- .col-8 -->
                <div class="col-4">
                    <h2>My Account</h2>
                    <ul>
                        <a href="#">Contactless</a>
                       
                    </ul>
                    
                </div>
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
                axios.get('/api/cards').then((response) => {
                    //console.log(response.data);
                    this.cards = response.data;
                });
            }
        }
    }
</script>