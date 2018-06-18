<template>
    <div>
        <div class="login row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Register</div><!-- /.card-header -->
                    <div class="card-body">
                        <form  @submit.prevent="upload">
                            <div class="row justify-content-center">
                                
                                <div class="form group row">
                                    <label for="name">Name:</label>
                                    <input name="name"  v-validate="'required|min:6'" type="text" class="form-control" placeholder="Name" v-model="form.name" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('name')">
                                        {{ errors.first('name') }}
                                    </p>
                                </div><!-- /.form group row -->
                            
                            </div><!-- /.row justify-content-center-->
                            
                            
                            <div class="row justify-content-center">
                                <div class="form group row">
                                    <label for="email">Email:</label>
                                    <input name="email"  v-validate="'required|email'" type="email" class="form-control" placeholder="Email" v-model="form.email" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('email')">
                                        {{ errors.first('email') }}
                                    </p>
                                </div><!-- /.form group row -->
                            
                            </div><!-- /.row justify-content-center-->
                            
                            
                            <div class="row justify-content-center">
                                <div class="form group row">
                                    <label for="password">Password:</label>
                                    <input name="password"  v-validate="'required|min:6'" type="password" class="form-control" placeholder="Password" v-model="form.password" autocomplete="off">
                                    <p class="help is-danger" v-show="errors.has('password')">
                                        {{ errors.first('password') }}
                                    </p>
                                </div><!-- /.form group row-->
                            </div><!-- /.row justify-content-center-->
                            
                            <div class="row justify-content-center">
                                <div class="form group row">
                                    <label for="password">Password Confirmation:</label>
                                    <input name="password_confirmation"  v-validate="'required|min:6'" type="password" class="form-control" placeholder="Password Confirmation" v-model="form.password_confirmation" autocomplete="off">
                                    <p class="help is-danger" v-show="errors.has('password_confirmation')">
                                        {{ errors.first('password_confirmation') }}
                                    </p>
                                </div><!-- /.form group row -->
                            </div><!-- /.row justify-content-center-->
                            
                            
                            <div class="row justify-content-center">
                                <div class="form group row">
                                    <button :disabled="errors.any()" type="submit" class="btn btn-primary" id="submit" value="register">Register</button>
                                
                                </div><!-- /.form group row -->
                            </div><!-- /.row -->
                        
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
                    password_confirmation: ''
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
                        this.$router.push({path: '/'});
                    })
                    .catch((error) => {
                        this.$store.commit('registerFailed', {error});
                    });
            }
        },

        computed: {
            registerError() {
                return this.$store.getters.registerError;
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