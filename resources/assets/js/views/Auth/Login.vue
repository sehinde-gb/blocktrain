<template>
    <div>
        <div class="login row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Login</div><!-- /.card-header -->
                    <div class="card-body">
                        <form @submit.prevent="authenticate">
                            <div class="form group row">
                                <label for="email">Email:</label>
                                <input type="email" v-model="form.email" class="form-control" placeholder="Email Address">
                            </div><!-- /.form group row -->
                            <div class="form group row">
                                <label for="password">Password:</label>
                                <input type="password" v-model="form.password" class="form-control" placeholder="Password" autocomplete="off">
                            </div><!-- /.form group row -->
                            <div class="form group row">
                                
                                <input type="submit" value="login">
                            </div><!-- /.form group row -->
    
                            <div class="form group row" v-if="authError">
                                <p class="error">
                                    {{ authError }}
                                </p>
                                <!-- /.error -->
                               
                            </div><!-- /.form group row -->
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-4 -->
        </div><!-- /.login row justify-content-center -->
    </div>
</template>

<script>
    import {login} from '../../helpers/auth';

    export default {
        name: "login",
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                error: null
            };
        },
        methods: {
            authenticate() {
                this.$store.dispatch('login');
                login(this.$data.form)
                    .then((res) => {
                        this.$store.commit("loginSuccess", res);
                        this.$router.push({path: '/'});
                    })
                    .catch((error) => {
                        this.$store.commit('loginFailed', {error});
                    });
            }
        },
        computed: {
            authError() {
                return this.$store.getters.authError;
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