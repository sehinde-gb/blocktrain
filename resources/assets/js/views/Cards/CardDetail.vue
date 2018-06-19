<template>
    <div>
    
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <h2 class="text-center">View Change Details</h2>
                            <div class="card text-center">
                                <p>Welcome </p>
                         
                                <div class="card-header">
                                    {{ card.id }}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">View Details</h5>
                                    <p class="card-text">Address: {{ card.address }}</p>
                                    <p class="card-text">Land Phone: {{ card.home_phone }}</p>
                                    <p class="card-text">Mobile Phone: {{ card.mobile_phone }}</p>
                                    <p class="card-text">Email: {{ card.email }}</p>
                                    <p class="card-text">Balance: {{ card.balance }}</p>
                                    <a class="btn btn-outline-primary"><router-link to="/cards">Back </router-link></a>

                                   
                                </div>
                                <div class="card-footer text-muted">
                                    2 days ago
                                </div>
                            </div><!-- .card -->
    
                        
                    </div><!-- end of .col-8 -->
                </div>
                    <div class="col-4">
                        <h2>My Account</h2>
                        <ul>
                            <a href="#">Contactless</a>
        
                        </ul>
    
                    </div><!-- end of .col-4 -->

                
            </div> <!-- end of .row -->
        
        </div><!-- end of .container -->
        
    </div>
</template>

<script>
    
    
    export default {
        data() {
            return {
                id: this.$route.params.id,
                //user: this.currentUser.id,
                
                card: {}
            }
        },
        created() {
            this.fetchACard();
            
        },
    computed: {
        currentUser() {
            return this.$store.getters.currentUser;
        }
    },
        methods: {
            fetchACard() {
                this.$http.get('/api/cards/' + this.id).then((response) => {
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