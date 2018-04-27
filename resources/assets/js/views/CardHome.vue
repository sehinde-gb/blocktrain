<template>
    <div id="show-cards">
        <h1>All Card Listings</h1>
    
        <input type="text" v-model="search" placeholder="search cards">
        <div v-for="card in filteredCards" class="single-card">
    
            <router-link v-bind:to="'/cards/' + card.id"><h4>Card Number: {{ card.id }}</h4></router-link>
            

        </div>


    </div>
</template>

<script>
    import searchMixin from '../mixins/searchMixin';

    export default {
        data () {
            return {
                cards: [],
                search: ''
            }
        },
        created() {
            this.$http.get('api/cards').then((response) => {
              //console.log(response.data)
              this.cards = response.data.data;
              
            });
        },
        mixins: [searchMixin]
       
    }
</script>

<style>
    #show-cards {
        max-width: 800px;
        margin: 0px auto;
    }
    .single-card {
        padding: 20px;
        margin: 20px 0;
        box-sizing: border-box;
        background: #eee;
    }
</style>
