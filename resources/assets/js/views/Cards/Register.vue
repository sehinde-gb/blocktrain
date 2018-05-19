<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h1 class="text-center">
                            Register Card
                        </h1><!-- /.text-center -->
                   
                        <form method="post" action="/api/passenger" @submit.prevent="onSubmit">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <input name="name"  v-validate="'required|min:6'" type="text" class="form-control" placeholder="Name" v-model="name" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('name')">
                                        {{ errors.first('name') }}
                                    </p>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        
                        
                            <div class="col-md-6">
                                <input name="address"  v-validate="'required|min:10'" type="text" class="form-control" placeholder="Address" v-model="address" autocomplete="nope">
                                <p class="help is-danger" v-show="errors.has('address')">
                                    {{ errors.first('address') }}
                                </p>
                            </div><!-- /.col-md-6 -->
                        
                        
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="home_phone"  v-validate="'required|numeric'" type="home_phone" class="form-control" placeholder="Home Phone" v-model="home_phone" autocomplete="nope">
                                    <p class="help is-danger" v-show="errors.has('home_phone')">
                                        {{ errors.first('home_phone') }}
                                    </p>
                                </div><!-- /.col-md-6 -->
                            </div>
                               
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <button :disabled="errors.any()" type="submit" class="btn btn-primary btn-block" id="submit-form">Register</button>
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
        name: ""
    }
</script>

<style scoped>

</style>