<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h1 class="text-center">
                            Register Card
                        </h1><!-- /.text-center -->
                   
                        <form method="post" action="/api/card" @submit.prevent="onSubmit">
                            
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <input name="name"  v-validate="'required|min:6'" type="text" class="form-control" placeholder="Name" v-model="name" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('name')">
                                        {{ errors.first('name') }}
                                    </p>
                                </div><!-- /.col-md-6 -->
                           
                        
                           
                                <div class="col-md-6">
                                    <input name="address"  v-validate="'required|min:10'" type="text" class="form-control" placeholder="Address" v-model="address" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('address')">
                                        {{ errors.first('address') }}
                                    </p>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            
                        
                        
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="home_phone"  v-validate="'required|numeric'" type="home_phone" class="form-control" placeholder="Home Phone" v-model="home_phone" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('home_phone')">
                                        {{ errors.first('home_phone') }}
                                    </p>
                                </div><!-- /.col-md-6 -->
                            
    
                            
                                <div class="col-md-6">
                                    <input name="mobile_phone"  v-validate="'required|numeric'" type="mobile_phone" class="form-control" placeholder="Mobile Phone" v-model="mobile_phone" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('mobile_phone')">
                                        {{ errors.first('mobile_phone') }}
                                    </p>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
    
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="email"  v-validate="'required|email'" type="email" class="form-control" placeholder="Email" v-model="email" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('email')">
                                        {{ errors.first('email') }}
                                    </p>
                                </div><!-- /.col-md-6 -->
                            
    
                          
                                <div class="col-md-6">
                                    <input name="balance"  v-validate="'required|decimal'" type="email" class="form-control" placeholder="Balance" v-model="balance" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('balance')">
                                        {{ errors.first('balance') }}
                                    </p>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
    
    
                            <div class="row">
                                <div class=".col-md-3 .offset-md-3">
                                    <button :disabled="errors.any()"  class="btn btn-primary btn-block" id="onSubmit">Submit</button>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                    
                        </form>
                    </div><!-- /.lead-form -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
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

                this.$http.post('https://blocktrain.test/api/card', this.$data);
            }

        }
    }
</script>

<style scoped>

</style>