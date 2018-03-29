<template>
    <div id="app">
            <ul>
                
                <h1>All Cards</h1>
                <li v-for="card in cards">
                    <button @click="deleteCard(card.id)" class="btn btn-danger btn-xs pull-right">Delete</button>
                    <button @click="showCard(card.id)" class="btn btn-danger btn-xs pull-right">Show</button>
                    ID: {{card.id }}
                    Balance:£ {{card.balance }}
                    Current Balance:£ {{ card.current_balance }}
                </li>
           </ul>
           
           
    
            <ul>
                <h1>Your Journeys</h1>
                <li v-for="journey in journeys">
                    
                    Your Fare is : £{{journey.endingFare}}
                </li>
            </ul>
            
            <h2>Updated Balance</h2>
            <ul>
                <div id="demo">{{ currentBalance }}</div>
            </ul>
            
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                cards: [],
                journeys: [],
                balance: '',
                endingFare: ''
            }
        },
        
        computed: {
            currentBalance: function () {
                return this.balance - this.endingFare
            }
        
        },

        created() {
            this.fetchCardList();
            this.fetchJourneyList();
            
        },
        methods: {
            fetchCardList() {
                axios.get('api/cards').then((response) => {
                    this.cards = response.data.data;
                });
            },
            fetchJourneyList() {
                axios.get('api/journeys').then((response) => {
                    this.journeys = response.data.data;
                });
            },
            deleteCard(id) {
                axios.delete('api/card/' + id)
                    .then((response) => {
                        this.fetchCardList()
                    })
                    .catch((errors) => this.cards = response.data.data);
            },
            showCard(id) {
                axios.get('api/card/' + id)
                    .then((response) => {
                        //this.fetchCardList()
                    })
                    .catch((errors) => this.cards = response.data.data);
            }
            
        }
        
    }
</script>

<style scoped>

</style>