<template>
    <div>
        <div class="container">
    
            <div class="card mb-3">
                
                <div class="card-body">
                    <h5 class="card-title">Your Card Details</h5>
                    <p class="card-text">Card {{ card.id }} is registered to {{ card.name }} your address is {{ card.name }}.</p>
                    <p class="card-text">Your home phone number is {{ card.home_phone }} and your mobile number is {{ card.mobile_phone }} and your email is {{ card.email }}</p>
                    <p class="card-text">The balance on your card is {{ card.balance }}</p>
    
                    <p class="card-text"><a class="btn btn-outline-primary btn-lg" role="button"><router-link to="/cards">Back </router-link></a>
                        <a class="btn btn-outline-primary btn-lg" role="button"><router-link to="/dashboard">Dashboard</router-link></a>
                        <a class="btn btn-outline-primary btn-lg" role="button"><router-link to="/">Home</router-link></a>
                    
                    </p>
                    
                    
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            
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
                axios.get('/api/card/' + this.id).then((response) => {
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