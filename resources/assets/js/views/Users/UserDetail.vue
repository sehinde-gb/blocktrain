<template>
    <div>
    
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <h2 class="text-center">View or Change Details</h2>
                        <br/>
                        <h5 class="text-center">Welcome {{ user.name }}</h5>
                        <br/>
                            <div class="card text-center">
                                <div class="card-header">
                                    Card No: {{ user.id }}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Address: {{ user.address }}</p>
                                    <p class="card-text">Land Phone: {{ user.home_phone }}</p>
                                    <p class="card-text">Mobile Phone: {{ user.mobile_phone }}</p>
                                    <p class="card-text">Email: {{ user.email }}</p>
                                    <p class="card-text">Balance: {{ user.balance }}</p>
                                    <a class="btn btn-outline-primary"><router-link to="/dashboard">Back </router-link></a>

                                   
                                </div>
                                <div class="card-footer text-muted">
                                    Created {{ moment(user.created_at).fromNow() }}
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

    var moment = require('moment');
    
    export default {
        data() {
            return {
                id: this.$route.params.id,
                moment: moment,
                user: {}
            }
        },
        created() {
            this.fetchAUser();
            
        },
    computed: {
        currentUser() {
            return this.$store.getters.currentUser;
        }
    },
        methods: {
            fetchAUser() {
                this.$http.get('/api/user/' + this.id).then((response) => {
                    //console.log(response);
                    this.user = response.body;
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