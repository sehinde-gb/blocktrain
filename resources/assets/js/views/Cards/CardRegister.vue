<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <h2 class="text-center">Register Card</h2>
                        <hr/>
                        <form method="post" action="/api/card" @submit.prevent="onSubmit">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name"  v-validate="'required|min:6'" type="text" class="form-control" placeholder="Name" v-model="name" autocomplete="nope" id="name">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input name="address"  v-validate="'required|min:10'" type="text" class="form-control" placeholder="Address" v-model="address" autocomplete="nope" id="address">
                            </div>
    
                            <div class="form-group">
                                <label for="home_phone">Land Phone</label>
                                <input name="home_phone"  v-validate="'required|numeric'" type="text" class="form-control" placeholder="Home Phone" v-model="home_phone" autocomplete="nope" id="home_phone">
                            </div>
    
                            <div class="form-group">
                                <label for="mobile_phone">Mobile Phone</label>
                                <input name="mobile_phone"  v-validate="'required|numeric'" type="text" class="form-control" placeholder="Mobile Phone" v-model="mobile_phone" autocomplete="nope" id="mobile_phone">
                            </div>
    
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email"  v-validate="'required|email'" type="email" class="form-control" placeholder="Email" v-model="email" autocomplete="nope" id="email">
                            </div>
    
                            <div class="form-group">
                                <label for="balance">Balance</label>
                                <input name="balance"  v-validate="'required|decimal'" type="text" class="form-control" placeholder="Balance" v-model="balance" autocomplete="nope" id="balance">
                            </div>
                            
                            <button class="btn btn-primary" id="onSubmit">Register</button>
                        
                        </form>
                <hr/>
                        <a class="btn btn-outline-primary"><router-link to="/cards">Back </router-link></a>
                </div><!-- /.lead-form -->

                
            </div> <!-- .col-8 -->
                <div class="col-4">
                    <h2>My Account</h2>
                    <ul>
                        <a href="#">Contactless</a>
        
                    </ul>
                </div><!-- end of .col-4 -->
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                name: '',
                address: '',
                home_phone: '',
                mobile_phone: '',
                email: '',
                balance: ''

            }

        },
        
        methods: {
            onSubmit: function () {

                //this.$http.post('https://blocktrain.test/api/card').then(response => console.log(response));

                axios.post('/api/cards', this.$data);
                alert('Your card has been registered successfully');
                this.$router.push('/cards')
                
            }

        }
    }
</script>

<style scoped>

</style>