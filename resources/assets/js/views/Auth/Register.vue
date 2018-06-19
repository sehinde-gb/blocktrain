<template>
    <div>
        <div class="login row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Register</div><!-- /.card-header -->
                    <div class="card-body">
                        <form  @submit.prevent="upload">
                        
                                <div class="form group row">
                                    <label for="name">Name:</label>
                                    <input name="name"  v-validate="'required|min:6'" type="text" class="form-control" placeholder="Name" v-model="form.name" autocomplete="nope">
                                    
                                </div><!-- /.form group row -->
                            
                            
                                <div class="form group row">
                                    <label for="email">Email:</label>
                                    <input name="email"  v-validate="'required|email'" type="email" class="form-control" placeholder="Email" v-model="form.email" autocomplete="nope">
                                   
                                </div><!-- /.form group row -->
                            
            
                                <div class="form group row">
                                    <label for="password">Password:</label>
                                    <input name="password"  v-validate="'required|min:6'" type="password" class="form-control" placeholder="Password" v-model="form.password" autocomplete="off">
                                    
                                </div><!-- /.form group row-->
                            
                            
                                <div class="form group row">
                                    <label for="password">Password Confirmation:</label>
                                    <input name="password_confirmation"  v-validate="'required|min:6'" type="password" class="form-control" placeholder="Password Confirmation" v-model="form.password_confirmation" autocomplete="off">
                                    
                                </div><!-- /.form group row -->
                           
    
                         
                                <div class="form group row">
                                    <label for="address">Address:</label>
                                    <input name="address"  v-validate="'required|numeric'" type="text" class="form-control" placeholder="Address" v-model="form.address" autocomplete="nope" id="address">
                                </div><!-- /.form group row-->
                            
    
    
                           
                                <div class="form group row">
                                    <label for="home_phone">Home Phone:</label>
                                    <input name="home_phone"  v-validate="'required|numeric'" type="text" class="form-control" placeholder="Home Phone" v-model="form.home_phone" autocomplete="nope" id="home_phone">
                                </div><!-- /.form group row-->
                            
    
                            
                                <div class="form group row">
                                    <label for="mobile_phone">Mobile Phone:</label>
                                    <input name="mobile_phone"  v-validate="'required|numeric'" type="text" class="form-control" placeholder="Mobile Phone" v-model="form.mobile_phone" autocomplete="nope" id="mobile_phone">
                                </div><!-- /.form group row-->
                            
    
                           
                                <div class="form group row">
                                    <label for="balance">Balance</label>
                                    <input name="balance"  v-validate="'required|decimal'" type="text" class="form-control" placeholder="Balance" v-model="form.balance" autocomplete="nope" id="balance">
                                </div><!-- /.form group row-->
                            
                            
                            
                            
                                <div class="form group row">
                                    <button :disabled="errors.any()" type="submit" class="btn btn-primary" id="submit" value="register">Register</button>
                                
                                </div><!-- /.form group row -->
    
                            <div class="form group row" v-if="regError">
                                <p class="error">
                                    {{ regError }}
                                </p>
                                <!-- /.error -->
    
                            </div><!-- /.form group row -->
                        </form>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!--col-md-4 -->
        </div><!-- login row justify-content-center -->
    </div>
</template>

<script>

    import {register} from '../../helpers/auth';

    export default {
       name: "register",
        data(){
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    home_phone: '',
                    mobile_phone: '',
                    balance: ''
                },
                error: null,


            };
        },
        methods: {
            upload() {
                this.$store.dispatch('register');
                register(this.$data.form)
                    .then((res) => {
                        this.$store.commit("registerSuccess", res);
                        alert('Your card has been registered successfully');
                        this.$router.push({path: '/dashboard'});
                    })
                    .catch((error) => {
                        this.$store.commit('registerFailed', {error});
                    });
            }
        },

        computed: {
            regError() {
                return this.$store.getters.regError;
            }
        }
        
    }
</script>

<style scoped>
    .error {
        text-align: center;
        color: red;
    }
</style>