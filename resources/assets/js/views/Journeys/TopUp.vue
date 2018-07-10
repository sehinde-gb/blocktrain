<template>
    <div>
         <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="lead-form">
                            <form method="post"  @submit.prevent="topUp">

                                    <div class="form group row">
                                                <input type="text" class="form-control" placeholder="Balance" v-model="start_balance"  id="start_balance">
                                                <span class="city-span">{{ start_balance }}</span>
                                        </div><!-- /.form group row -->

                            </form>    
                                    
                                            <div class="row">
                                               
                                                <button :disabled="errors.any()" type="submit" class="btn btn-primary btn-lg" id="submit" @click.prevent="topUp">Top Up</button>
                                                
                                                
                                                <div class="col-sm"></div>
                                            </div>
                                            
                                        </div><!-- /.col-8 -->
                                        
                                    </div><!-- /.row -->
    
                                
                                
                            </form>
                            
                        </div><!-- end of .lead-form -->
                    </div> <!-- end of .col-8 -->
                </div> <!-- end of .row -->
            </div> <!-- end of .container -->
   
    </div>
</template>

<script>

export default {
        data() {
            return {
                    user_id: this.$route.params.id,
                    start_balance: ''
                
            }
        },
        computed: {
         users() {
                return this.$store.getters.getUsers;
            }
        },
    
    methods: {
        
        topUp() {
             this.$store.dispatch('addBalance', {
                 user_id: this.user_id,
                 start_balance: this.start_balance
             })   

        }
    }

}

</script>