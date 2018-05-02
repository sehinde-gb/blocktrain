<template>
    <div>
        <div class="container">
            <div class="card" style="width: 18rem;">
        
                <div class="card-body">
                    <h5 class="card-title">Your Card Details</h5>
                    <p class="card-text">Card {{ card.id }}</p>
                    <p class="card-text">Card Number: {{ card.id }}</p>
                    <p class="card-text">Balance: {{ card.balance }}</p>
                    <p class="card-text">Current Balance: {{ card.current_balance }}</p>
        
                </div><!-- /.card-body -->
                <a class="btn btn-outline-primary btn-lg" role="button"><router-link to="/card">Back </router-link></a>
            </div><!-- /#single-card -->
        </div><!-- /.container -->
    
        
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                id: this.$route.params.id,
                card: {}
            }
        },
        created() {
            this.fetchACard();
            
        },
        methods: {
            fetchACard() {
                this.$http.get('https://blocktrain.test/api/card/' + this.id).then((response) => {
                    //console.log(response);
                    this.card = response.body;
                });
            }
        },
        
        filters: {
            toUpperCase(value) {
                return value.toUpperCase();
            }
        }
    }
</script>

<style scoped>
    #single-card {
        max-width: 960px;
        margin: 0 auto;
    }
</style>